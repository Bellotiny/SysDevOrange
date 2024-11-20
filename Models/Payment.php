<?php

include_once "Model.php";

class Payment extends Model {
    public const TABLE = "payments";

    public final const id = self::TABLE . ".id";
    public final const status = self::TABLE . ".status";
    public final const amount = self::TABLE . ".amount";
    public final const dateTime = self::TABLE . ".dateTime";

    public bool $status;
    public float $amount;
    public int $dateTime;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->status = $fields[self::status];
        $this->amount = $fields[self::amount];
        $this->dateTime = $fields[self::dateTime];
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::status => $this->status,
            self::amount => $this->amount,
            self::dateTime => $this->dateTime,
        ];
    }

    public static function new(bool $status, float $amount, int $dateTime): ?Payment {
        $values = new Values();
        $values->add(new Value(self::status, $status));
        $values->add(new Value(self::amount, $amount));
        $values->add(new Value(self::dateTime, $dateTime));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Payment([
                self::id => $id,
                self::status => $status,
                self::amount => $amount,
                self::dateTime => $dateTime,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}