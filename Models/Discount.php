<?php

include_once "Model.php";

class Discount extends Model {
    public const TABLE = "discounts";

    public final const id = self::TABLE . ".id";
    public final const name = self::TABLE . ".name";
    public final const start = self::TABLE . ".start";
    public final const end = self::TABLE . ".end";
    public final const percent = self::TABLE . ".percent";
    public final const amount = self::TABLE . ".amount";

    public string $name;
    public int $start;
    public int $end;
    public float $percent;
    public float $amount;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->name = $fields[self::name];
        $this->start = $fields[self::start];
        $this->end = $fields[self::end];
        $this->percent = $fields[self::percent];
        $this->amount = $fields[self::amount];
    }

    public function toAssoc(): array {
        return [
            self::id => $this->id,
            self::name => $this->name,
            self::start => $this->start,
            self::end => $this->end,
            self::percent => $this->percent,
            self::amount => $this->amount,
        ];
    }

    public static function new(string $name, int $start, int $end, float $percent, float $amount): ?Discount {
        $values = new Values();
        $values->add(new Value(self::name, $name));
        $values->add(new Value(self::start, $start));
        $values->add(new Value(self::end, $end));
        $values->add(new Value(self::percent, $percent));
        $values->add(new Value(self::amount, $amount));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Discount([
                self::id => $id,
                self::name => $name,
                self::start => $start,
                self::end => $end,
                self::percent => $percent,
                self::amount => $amount,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}