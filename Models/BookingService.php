<?php

include_once "Models/Model.php";
include_once "Models/User.php";
include_once "Models/Group.php";

final class BookingService extends Model {
    public const TABLE = "bookings_services";

    final public const id = self::TABLE . ".id";
    final public const bookingID = self::TABLE . ".bookingID";
    final public const serviceID = self::TABLE . ".serviceID";

    public Booking $booking;
    public Service $service;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->booking = new Booking($fields);
        $this->service = new Service($fields);
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::bookingID => $this->booking->id,
            self::serviceID => $this->service->id,
            ...$this->booking->toAssoc(),
            ...$this->service->toAssoc(),
        ];
    }

    public static function getJoin(): ?Join {
        return (new Join())
            ->addLeft(Booking::getFields(), Booking::TABLE, Booking::id, self::bookingID, Booking::getJoin())
            ->addLeft(Service::getFields(), Service::TABLE, Service::id, self::serviceID, Service::getJoin());
    }

    public static function new(Booking $booking, Service $service): ?self {
        $values = new Values();
        $values->add(new Value(self::bookingID, $booking->id));
        $values->add(new Value(self::serviceID, $service->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                ...$booking->toAssoc(),
                ...$service->toAssoc(),
            ]);
        } catch (Exception) {
            return null;
        }
    }
}