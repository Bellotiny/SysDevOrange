<?php

include_once "Model.php";

class Image extends Model {
    public string $name;
    public string $data;

    public static function getTable(): string {
        return "bookings";
    }

    public static function new(string $name, string $data): ?Image {
        $image = new Image();
        $values = new Values();
        $values->add(new Value("name", $image->name = $name));
        $values->add(new Value("data", $image->data = $data));

        try {
            self::insertRow($values, false);
            $image->id = self::getConnection()->insert_id;
            return $image;
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value("name", $this->name));
        $values->add(new Value("data", $this->data));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}