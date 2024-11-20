<?php

include_once "Model.php";

class Availability extends Model {
    public const TABLE = "availabilities";

    public final const id = self::TABLE . ".id";
    public final const timeSlot = self::TABLE . ".timeSlot";
    public final const bookingID = self::TABLE . ".bookingID";

    public int $timeSlot;
    public ?Booking $booking;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->timeSlot = $fields[self::timeSlot];
        $this->booking = ($fields[Booking::id] ? new Booking($fields) : null);
    }

    public function toAssoc(): array {
        return [
            self::id => $this->id,
            self::timeSlot => $this->timeSlot,
            self::bookingID => $this->booking?->id,
        ];
    }

    public static function new(int $timeSlot, ?Booking $booking): ?Availability {
        $values = new Values();
        $values->add(new Value(self::timeSlot, $timeSlot));
        $values->add(new Value(self::bookingID, $booking?->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Availability([
                self::id => $id,
                self::timeSlot => $timeSlot,
                ...($booking ? $booking->toAssoc() : []),
            ]);
        } catch (Exception) {
            return null;
        }
    }
}