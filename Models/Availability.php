<?php

include_once "Model.php";

class Availability extends Model {
    private int $id;
    private int $start;
    private int $end;

    /**
     * @return Availability[]
     */
    public static function list(): array {
        return Model::listAll("availabilities", "Availability");
    }

    public static function getFromId(int $id): Availability|false|null {
        $where = new Where();
        $where->addEquals(new Value($id, "id"));
        return Model::getRows("availabilities", $where)->fetch_object("Availability");
    }

    public static function new(int $start, int $end): Availability|false {
        $availability = new Availability();
        $values = new Values();
        $values->add(new Value($availability->start = $start, "start"));
        $values->add(new Value($availability->end = $end, "end"));

        try {
            Model::insertRow("availabilities", $values, false);
            $availability->id = self::getConnection()->insert_id;
            return $availability;
        } catch (Exception $e) {
            return false;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value($this->start, "start"));
        $values->add(new Value($this->end, "end"));
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return Model::updateRows("availabilities", $values, $where);
    }

    public function delete(): bool {
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return Model::deleteRows("availabilities", $where);
    }
}