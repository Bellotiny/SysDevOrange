<?php

include_once "Model.php";

class Availability extends Model {
    public int $start;
    public int $end;

    public static function getTable(): string {
        return "availabilities";
    }

    public static function new(int $start, int $end): ?Availability {
        $availability = new Availability();
        $values = new Values();
        $values->add(new Value("start", $availability->start = $start));
        $values->add(new Value("end", $availability->end = $end));

        try {
            self::insertRow($values, false);
            $availability->id = self::getConnection()->insert_id;
            return $availability;
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value("start", $this->start));
        $values->add(new Value("end", $this->end));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}