<?php

include_once "Model.php";
include_once "User.php";
include_once "Group.php";

final class BookingImage extends Model {
    public const TABLE = "bookings_images";

    final public const id = self::TABLE . ".id";
    final public const bookingID = self::TABLE . ".bookingID";
    final public const imageID = self::TABLE . ".imagesID";

    public Booking $booking;
    public Image $image;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->booking = new Booking($fields);
        $this->image = new Image($fields);
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::bookingID => $this->booking->id,
            self::imageID => $this->image->id,
            ...$this->booking->toAssoc(),
            ...$this->image->toAssoc(),
        ];
    }

    public static function getJoin(): ?Join {
        return (new Join())
            ->addInner(Booking::getFields(), Booking::TABLE, Booking::id, self::bookingID, Booking::getJoin())
            ->addInner(Image::getFields(), Image::TABLE, Image::id, self::imageID, Image::getJoin());
    }

    public static function new(Booking $booking, Image $image): ?self {
        $values = new Values();
        $values->add(new Value(self::bookingID, $booking->id));
        $values->add(new Value(self::imageID, $image->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                $booking->toAssoc(),
                $image->toAssoc(),
            ]);
        } catch (Exception) {
            return null;
        }
    }
}