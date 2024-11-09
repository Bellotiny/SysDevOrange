<?php

include_once "Model.php";

class Image extends Model {
    public string $name;
    public string $data;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->name = $fields[self::getTable() . '.name'];
        $this->data = $fields[self::getTable() . '.data'];
    }

    public static function getTable(): string {
        return "images";
    }

    public static function getFields(): array {
        return ["id", "name", "data"];
    }

    public static function new(string $name, string $data): ?Image {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $name));
        $values->add(new Value(self::getTable() . ".data", $data));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Image([
                self::getTable() . ".id" => $id,
                self::getTable() . ".name" => $name,
                self::getTable() . ".data" => $data,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $this->name));
        $values->add(new Value(self::getTable() . ".data", $this->data));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}