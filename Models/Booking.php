<?php

include_once "Model.php";

class Booking extends Model {
    public string $status;
    public int $start;
    public int $end;
    public int $userID;
    public int $paymentID;
    public int $discountID;

    protected static function getTable(): string {
        return "bookings";
    }

    public static function new(string $status, int $start, int $end, int $userID, int $paymentID, int $discountID): Booking|false {
        $booking = new Booking();
        $values = new Values();
        $values->add(new Value($booking->status = $status, "status"));
        $values->add(new Value($booking->start = $start, "start"));
        $values->add(new Value($booking->end = $end, "end"));
        $values->add(new Value($booking->userID = $userID, "userID"));
        $values->add(new Value($booking->paymentID = $paymentID, "paymentID"));
        $values->add(new Value($booking->discountID = $discountID, "discountID"));


        try {
            self::insertRow($values, false);
            $booking->id = self::getConnection()->insert_id;
            return $booking;
        } catch (Exception) {
            return false;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value($this->status, "status"));
        $values->add(new Value($this->start, "start"));
        $values->add(new Value($this->end, "end"));
        $values->add(new Value($this->userID, "userID"));
        $values->add(new Value($this->paymentID, "paymentID"));
        $values->add(new Value($this->discountID, "discountID"));
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::updateRows($values, $where);
    }
}