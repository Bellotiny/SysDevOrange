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

    public static function new(string $name, int $start, int $end, float $percent, float $amount): ?Discount {
        $discount = new Discount();
        $values = new Values();
        $values->add(new Value("name", $discount->name = $name));
        $values->add(new Value("start", $discount->start = $start));
        $values->add(new Value("end", $discount->end = $end));
        $values->add(new Value("percent", $discount->percent = $percent));
        $values->add(new Value("amount", $discount->amount = $amount));


        try {
            self::insertRow($values, false);
            $discount->id = self::getConnection()->insert_id;
            return $discount;
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value("name", $this->name));
        $values->add(new Value("start", $this->start));
        $values->add(new Value("end", $this->end));
        $values->add(new Value("percent", $this->percent));
        $values->add(new Value("amount", $this->amount));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}