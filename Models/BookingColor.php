<?php

include_once "Model.php";
include_once "User.php";
include_once "Group.php";

final class BookingColor extends Model {
    public const TABLE = "bookings_colors";

    final public const id = self::TABLE . ".id";
    final public const bookingID = self::TABLE . ".bookingID";
    final public const colorID = self::TABLE . ".colorID";

    public Booking $booking;
    public Color $color;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->booking = new Booking($fields);
        $this->color = new Color($fields);
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::bookingID => $this->booking->id,
            self::colorID => $this->color->id,
        ];
    }

    protected static function getJoin(): ?Join {
        return (new Join())
            ->addInner(Booking::getFields(), Booking::TABLE, Booking::id, self::bookingID)
            ->addInner(Color::getFields(), Color::TABLE, Color::id, self::colorID);
    }

    public static function new(Booking $booking, Color $color): ?self {
        $values = new Values();
        $values->add(new Value(self::bookingID, $booking->id));
        $values->add(new Value(self::colorID, $color->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                ...$booking->toAssoc(),
                ...$color->toAssoc(),
            ]);
        } catch (Exception) {
            return null;
        }
    }
}