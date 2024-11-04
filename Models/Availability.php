<?php

include_once "Model.php";

class Availability extends Model {
    public int $start;
    public int $end;

    protected static function getTable(): string {
        return "availabilities";
    }

    public static function new(int $start, int $end): Availability|false {
        $availability = new Availability();
        $values = new Values();
        $values->add(new Value($availability->start = $start, "start"));
        $values->add(new Value($availability->end = $end, "end"));

        try {
            self::insertRow($values, false);
            $availability->id = self::getConnection()->insert_id;
            return $availability;
        } catch (Exception) {
            return false;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value($this->start, "start"));
        $values->add(new Value($this->end, "end"));
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::updateRows($values, $where);
    }
}