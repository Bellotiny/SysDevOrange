<?php

include_once "Model.php";

class Payment extends Model {
    public bool $status;
    public float $amount;
    public int $dateTime;

    protected static function getTable(): string {
        return "payments";
    }

    public static function new(bool $status, float $amount, int $dateTime): ?Payment {
        $Payment = new Payment();
        $values = new Values();
        $values->add(new Value("status", $Payment->status = $status));
        $values->add(new Value("amount", $Payment->amount = $amount));
        $values->add(new Value("dateTime", $Payment->dateTime = $dateTime));

        try {
            self::insertRow($values, false);
            $Payment->id = self::getConnection()->insert_id;
            return $Payment;
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value("status", $this->status));
        $values->add(new Value("amount", $this->amount));
        $values->add(new Value("dateTime", $this->dateTime));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}