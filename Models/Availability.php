<?php

include_once "Models/Model.php";
include_once "Models/Booking.php";

final class Availability extends Model {
    public const TABLE = "availabilities";

    final public const id = self::TABLE . ".id";
    final public const timeSlot = self::TABLE . ".timeSlot";
    final public const bookingID = self::TABLE . ".bookingID";

    public string $timeSlot;
    public ?Booking $booking;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->timeSlot = $fields[self::timeSlot];
        $this->booking = isset($fields[Booking::id]) ? new Booking($fields) : null;
    }

    public function toAssoc(): array {
        return [
            self::id => $this->id,
            self::timeSlot => $this->timeSlot,
            self::bookingID => $this->booking?->id,
        ];
    }

    public static function getJoin(): ?Join {
        return (new Join())->addLeft(Booking::getFields(), Booking::TABLE, Booking::id, self::bookingID, Booking::getJoin());
    }

    public static function new(string $timeSlot, ?Booking $booking = null): ?self {
        $values = new Values();
        $values->add(new Value(self::timeSlot, $timeSlot));
        $values->add(new Value(self::bookingID, $booking?->id));

        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::timeSlot => $timeSlot,
                ...($booking ? $booking->toAssoc() : []),
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public static function newMany(int $startTime, int $endTime): ?array {
        $existing = array_map(fn($availability) => strtotime($availability->timeSlot), self::listBetween($startTime, $endTime));
        $list = [];
        $time = $startTime;
        while ($time < $endTime) {
            if (!in_array($time, $existing)) {
                $values = new Values();
                $values->add(new Value(self::timeSlot, date("Y-m-d H:i:s", $time)));
                $list[] = $values;
            }
            $time += 30 * 60;
        }
        try {
            return self::insertMany($list, false);
        } catch (Exception) {
            return null;
        }
    }

    public static function listUnavailable(int $page): array {
        $where = new Where(new IsNull(self::bookingID, true));
        $order = new Order([self::timeSlot], true);
        return self::list($where, null, 25, (25 * $page), $order);
    }

    public static function listFutureAvailable(): array {
        $where = (new Where(new GreaterThanOrEquals(new Value(self::timeSlot, date("Y-m-d H:i:s", strtotime('today midnight'))))))
            ->addAnd(new IsNull(self::bookingID));
        $order = new Order([self::timeSlot], true);
        return self::list($where, null, null, null, $order);
    }

    public static function listFuture(): array {
        $where = new Where(new GreaterThanOrEquals(new Value(self::timeSlot, date("Y-m-d H:i:s", strtotime('today midnight')))));
        $order = new Order([self::timeSlot], true);
        return self::list($where, null, null, null, $order);
    }

    public static function listBetween(int $start, int $end): array {
        $where = (new Where(new GreaterThanOrEquals(new Value(self::timeSlot, date("Y-m-d H:i:s", $start)))))
            ->addAnd(new LessThan(new Value(self::timeSlot, date("Y-m-d H:i:s", $end))));
        return self::list($where);
    }

    public static function deleteAvailableBetween(int $start, int $end): bool {
        $where = (new Where(new GreaterThanOrEquals(new Value(self::timeSlot, date("Y-m-d H:i:s", $start)))))
            ->addAnd(new LessThan(new Value(self::timeSlot, date("Y-m-d H:i:s", $end))))
            ->addAnd(new IsNull(self::bookingID));
        return self::delete($where);
    }

    public static function listAvailableTime(): ?array {
        return self::list(new Where(new IsNull(self::bookingID)));
    }

    public static function getFromDateTime(String $date_time): ?self {
        return self::get(new Where(new Like(new Value(self::timeSlot, $date_time))));
    }
}