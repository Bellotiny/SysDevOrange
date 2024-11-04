<?php

include_once "Model.php";

class Payment extends Model {
    public bool $status;
    public float $amount;
    public int $dateTime;

    protected static function getTable(): string {
        return "payments";
    }

    public static function new(bool $status, float $amount, int $dateTime): Payment|false {
        $Payment = new Payment();
        $values = new Values();
        $values->add(new Value($Payment->status = $status, "status"));
        $values->add(new Value($Payment->amount = $amount, "amount"));
        $values->add(new Value($Payment->dateTime = $dateTime, "dateTime"));

        try {
            self::insertRow($values, false);
            $Payment->id = self::getConnection()->insert_id;
            return $Payment;
        } catch (Exception) {
            return false;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value($this->status, "status"));
        $values->add(new Value($this->amount, "amount"));
        $values->add(new Value($this->dateTime, "dateTime"));
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::updateRows($values, $where);
    }

    public function delete(): bool {
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::deleteRows($where);
    }
}