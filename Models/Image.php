<?php

include_once "Model.php";

class Image extends Model {
    public string $name;
    public string $data;

    protected static function getTable(): string {
        return "bookings";
    }

    public static function new(string $name, string $data): Image|false {
        $image = new Image();
        $values = new Values();
        $values->add(new Value($image->name = $name, "name"));
        $values->add(new Value($image->data = $data, "data"));

        try {
            self::insertRow($values, false);
            $image->id = self::getConnection()->insert_id;
            return $image;
        } catch (Exception) {
            return false;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value($this->name, "name"));
        $values->add(new Value($this->data, "data"));
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