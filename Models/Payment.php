<?php

include_once "Model.php";

class Payment extends Model {
    public bool $status;
    public float $amount;
    public int $dateTime;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->status = $fields[self::getTable() . '.status'];
        $this->amount = $fields[self::getTable() . '.amount'];
        $this->dateTime = $fields[self::getTable() . '.dateTime'];
    }

    public static function getTable(): string {
        return "payments";
    }

    public static function getFields(): array {
        return ["id", "status", "amount", "dateTime"];
    }

    public function getAssoc(): array {
        return [
            self::getTable() . ".id" => $this->id,
            self::getTable() . ".status" => $this->status,
            self::getTable() . ".amount" => $this->amount,
            self::getTable() . ".dateTime" => $this->dateTime,
        ];
    }

    public static function new(bool $status, float $amount, int $dateTime): ?Payment {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".status", $status));
        $values->add(new Value(self::getTable() . ".amount", $amount));
        $values->add(new Value(self::getTable() . ".dateTime", $dateTime));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Payment([
                self::getTable() . ".id" => $id,
                self::getTable() . ".status" => $status,
                self::getTable() . ".amount" => $amount,
                self::getTable() . ".dateTime" => $dateTime,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".status", $this->status));
        $values->add(new Value(self::getTable() . ".amount", $this->amount));
        $values->add(new Value(self::getTable() . ".dateTime", $this->dateTime));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}