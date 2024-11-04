<?php

include_once "Model.php";

class Discount extends Model {
    public string $name;
    public int $start;
    public int $end;
    public float $percent;
    public float $amount;

    protected static function getTable(): string {
        return "discounts";
    }

    public static function new(string $name, int $start, int $end, float $percent, float $amount): Discount|false {
        $discount = new Discount();
        $values = new Values();
        $values->add(new Value($discount->name = $name, "name"));
        $values->add(new Value($discount->start = $start, "start"));
        $values->add(new Value($discount->end = $end, "end"));
        $values->add(new Value($discount->percent = $percent, "percent"));
        $values->add(new Value($discount->amount = $amount, "amount"));


        try {
            self::insertRow($values, false);
            $discount->id = self::getConnection()->insert_id;
            return $discount;
        } catch (Exception) {
            return false;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value($this->name, "name"));
        $values->add(new Value($this->start, "start"));
        $values->add(new Value($this->end, "end"));
        $values->add(new Value($this->percent, "percent"));
        $values->add(new Value($this->amount, "amount"));
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