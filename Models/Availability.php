<?php

include_once "Model.php";

class Availability extends Model {
    public int $start;
    public int $end;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->start = $fields[self::getTable() . '.start'];
        $this->end = $fields[self::getTable() . '.end'];
    }

    public static function getTable(): string {
        return "availabilities";
    }

    public static function getFields(): array {
        return ["id", "start", "end"];
    }

    public static function new(int $start, int $end): ?Availability {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".start", $start));
        $values->add(new Value(self::getTable() . ".end", $end));

        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Availability([
                self::getTable() . ".id" => $id,
                self::getTable() . ".start" => $start,
                self::getTable() . ".end" => $end,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".start", $this->start));
        $values->add(new Value(self::getTable() . ".end", $this->end));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}