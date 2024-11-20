<?php

include_once "Model.php";

class Booking extends Model {
    public const TABLE = "bookings";

    public final const id = self::TABLE . ".id";
    public final const status = self::TABLE . ".status";
    public final const location = self::TABLE . ".location";
    public final const userID = self::TABLE . ".userID";
    public final const paymentID = self::TABLE . ".paymentID";
    public final const discountID = self::TABLE . ".discountID";

    public string $status;
    public string $location;
    public User $user;
    public Payment $payment;
    public ?Discount $discount;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->status = $fields[self::status];
        $this->location = $fields[self::location];
        $this->user = new User($fields);
        $this->payment = new Payment($fields);
        $this->discount = ($fields[Discount::id] ? new Discount($fields) : null);
    }

    public function toAssoc(): array {
        return [
            self::id => $this->id,
            self::status => $this->status,
            self::location => $this->location,
            self::userID => $this->user->id,
            self::paymentID => $this->payment->id,
            self::discountID => $this->discount?->id,
        ];
    }

    public static function new(string $status, string $location, User $user, Payment $payment, ?Discount $discount): ?Booking {
        $values = new Values();
        $values->add(new Value(self::status, $status));
        $values->add(new Value(self::location, $location));
        $values->add(new Value(self::userID, $user->id));
        $values->add(new Value(self::paymentID, $payment->id));
        $values->add(new Value(self::discountID, $discount?->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Booking([
                self::id => $id,
                self::status => $status,
                self::location => $location,
                self::userID => $user->id,
                self::paymentID => $payment->id,
                self::discountID => $discount?->id,
                ...$user->toAssoc(),
                ...$payment->toAssoc(),
                ...($discount ? $discount->toAssoc() : []),
            ]);
        } catch (Exception) {
            return null;
        }
    }
}