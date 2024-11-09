<?php

include_once "Model.php";

class Discount extends Model {
    public string $name;
    public int $start;
    public int $end;
    public float $percent;
    public float $amount;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->name = $fields[self::getTable() . '.name'];
        $this->start = $fields[self::getTable() . '.start'];
        $this->end = $fields[self::getTable() . '.end'];
        $this->percent = $fields[self::getTable() . '.percent'];
        $this->amount = $fields[self::getTable() . '.amount'];
    }

    public static function getTable(): string {
        return "discounts";
    }

    public static function getFields(): array {
        return ["id", "name", "start", "end", "percent", "amount"];
    }

    public function getAssoc(): array {
        return [
            self::getTable() . ".id" => $this->id,
            self::getTable() . ".name" => $this->name,
            self::getTable() . ".start" => $this->start,
            self::getTable() . ".end" => $this->end,
            self::getTable() . ".percent" => $this->percent,
            self::getTable() . ".amount" => $this->amount,
        ];
    }

    public static function new(string $name, int $start, int $end, float $percent, float $amount): ?Discount {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $name));
        $values->add(new Value(self::getTable() . ".start", $start));
        $values->add(new Value(self::getTable() . ".end", $end));
        $values->add(new Value(self::getTable() . ".percent", $percent));
        $values->add(new Value(self::getTable() . ".amount", $amount));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Discount([
                self::getTable() . ".id" => $id,
                self::getTable() . ".name" => $name,
                self::getTable() . ".start" => $start,
                self::getTable() . ".end" => $end,
                self::getTable() . ".percent" => $percent,
                self::getTable() . ".amount" => $amount,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $this->name));
        $values->add(new Value(self::getTable() . ".start", $this->start));
        $values->add(new Value(self::getTable() . ".end", $this->end));
        $values->add(new Value(self::getTable() . ".percent", $this->percent));
        $values->add(new Value(self::getTable() . ".amount", $this->amount));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}