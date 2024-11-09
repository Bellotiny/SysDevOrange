<?php

include_once "Model.php";

class Booking extends Model {
    public string $status;
    public int $start;
    public int $end;
    public User $user;
    public Payment $payment;
    public Discount $discount;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->status = $fields[self::getTable() . '.status'];
        $this->start = $fields[self::getTable() . '.start'];
        $this->end = $fields[self::getTable() . '.end'];
        $this->user = new User($fields);
        $this->payment = new Payment($fields);
        $this->discount = new Discount($fields);
    }

    public static function getTable(): string {
        return "bookings";
    }

    public static function getFields(): array {
        return ["id", "status", "start", "end", "userID", "paymentID", "discountID"];
    }

    public static function new(string $status, int $start, int $end, User $user, Payment $payment, Discount $discount): ?Booking {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".status", $status));
        $values->add(new Value(self::getTable() . ".start", $start));
        $values->add(new Value(self::getTable() . ".end", $end));
        $values->add(new Value(self::getTable() . ".userID", $user->id));
        $values->add(new Value(self::getTable() . ".paymentID", $payment->id));
        $values->add(new Value(self::getTable() . ".discountID", $discount->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Booking([
                self::getTable() . ".id" => $id,
                self::getTable() . ".status" => $status,
                self::getTable() . ".start" => $start,
                self::getTable() . ".end" => $end,
                self::getTable() . ".userID" => $user->id,
                self::getTable() . ".paymentID" => $payment->id,
                self::getTable() . ".discountID" => $discount->id,
                ...$user->getAssoc(),
                ...$payment->getAssoc(),
                ...$discount->getAssoc(),
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".status", $this->status));
        $values->add(new Value(self::getTable() . ".start", $this->start));
        $values->add(new Value(self::getTable() . ".end", $this->end));
        $values->add(new Value(self::getTable() . ".userID", $this->user->id));
        $values->add(new Value(self::getTable() . ".paymentID", $this->payment->id));
        $values->add(new Value(self::getTable() . ".discountID", $this->discount->id));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}