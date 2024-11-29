<?php

include_once "Model.php";
include_once "User.php";
include_once "Discount.php";

final class Booking extends Model {
    public const TABLE = "bookings";

    final public const id = self::TABLE . ".id";
    final public const userID = self::TABLE . ".userID";
    final public const price = self::TABLE . ".price";
    final public const message = self::TABLE . ".message";
    final public const payedOn = self::TABLE . ".payedOn";
    final public const bookedOn = self::TABLE . ".bookedOn";
    final public const location = self::TABLE . ".location";
    final public const discountID = self::TABLE . ".discountID";

    public User $user;
    public float $price;
    public ?string $message;
    public ?string $payedOn;
    public ?string $bookedOn;
    public ?string $location;
    public ?Discount $discount;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->user = new User($fields);
        $this->price = $fields[self::price];
        $this->message = $fields[self::message];
        $this->payedOn = $fields[self::payedOn];
        $this->bookedOn = $fields[self::bookedOn];
        $this->location = $fields[self::location];
        $this->discount = isset($fields[Discount::id]) ? new Discount($fields) : null;
    }

    public function toAssoc(): array {
        return [
            self::id => $this->id,
            self::userID => $this->user->id,
            self::price => $this->price,
            self::message => $this->message,
            self::payedOn => $this->payedOn,
            self::bookedOn => $this->bookedOn,
            self::location => $this->location,
            self::discountID => $this->discount?->id,
        ];
    }

    protected static function getJoin(): ?Join {
        return (new Join())
            ->addInner(User::getFields(), User::TABLE, User::id, self::userID)
            ->addLeft(Discount::getFields(), Discount::TABLE, Discount::id, self::discountID);
    }

    public static function new(User $user, float $price, string $message, ?string $payedOn = null, ?string $bookedOn = null, ?string $location = null, ?Discount $discount = null): ?self {
        $values = new Values();
        $values->add(new Value(self::userID, $user->id));
        $values->add(new Value(self::price, $price));
        $values->add(new Value(self::message, $message));
        $values->add(new Value(self::payedOn, $payedOn));
        $values->add(new Value(self::bookedOn, $bookedOn));
        $values->add(new Value(self::location, $location));
        $values->add(new Value(self::discountID, $discount?->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            $booking = new self([
                self::id => $id,
                ...$user->toAssoc(),
                self::price => $price,
                self::message => $message,
                self::payedOn => $payedOn,
                self::bookedOn => $bookedOn,
                self::location => $location,
                ...($discount ? $discount->toAssoc() : []),
            ]);
            UserGroup::new($user, Group::getFromName("registeredUsers"));
            return $booking;
        } catch (Exception) {
            return null;
        }
    }

    /**
     * @throws DateMalformedStringException
     */
    public function getBookedDateTime(): DateTime {
        return new DateTime($this->bookedOn);
    }

    /**
     * @throws DateMalformedStringException
     */
    public function getPayedDateTime(): DateTime {
        return new DateTime($this->payedOn);
    }

    public function getImages(): array {
        $join = (new Join())->addInner(BookingImage::getFields(), BookingImage::TABLE, BookingImage::imageID, Image::id);
        $where = (new Where())->addEquals(new Value(BookingImage::bookingID, $this->id));
        return Image::list($where, $join);
    }

    public function getServices(): array {
        $join = (new Join())->addInner(BookingService::getFields(), BookingService::TABLE, BookingService::serviceID, Service::id);
        $where = (new Where())->addEquals(new Value(BookingService::bookingID, $this->id));
        return Service::list($where, $join);
    }

    public function getColors(): array {
        $join = (new Join())->addInner(BookingColor::getFields(), BookingColor::TABLE, BookingColor::colorID, Color::id);
        $where = (new Where())->addEquals(new Value(BookingColor::bookingID, $this->id));
        return Color::list($where, $join);
    }

    public function getAvailabilities(): array {
        $where = new Where();
        $where->addEquals(new Value(Availability::bookingID, $this->id));
        return Availability::list($where);
    }

    public function getFinalPrice(): float {
        $final = $this->price;
        if ($this->discount) {
            $final = (($this->discount->percent / 100) * $final) - $this->discount->percent;
        }
        // TODO Apply birthday discount if it is their birthday
        return $final;
    }
}