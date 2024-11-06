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
        $values->add(new Value("status", $booking->status = $status));
        $values->add(new Value("start", $booking->start = $start));
        $values->add(new Value("end", $booking->end = $end));
        $values->add(new Value("userID", $booking->userID = $userID));
        $values->add(new Value("paymentID", $booking->paymentID = $paymentID));
        $values->add(new Value("discountID", $booking->discountID = $discountID));


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
        $values->add(new Value("status", $this->status));
        $values->add(new Value("start", $this->start));
        $values->add(new Value("end", $this->end));
        $values->add(new Value("userID", $this->userID));
        $values->add(new Value("paymentID", $this->paymentID));
        $values->add(new Value("discountID", $this->discountID));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}