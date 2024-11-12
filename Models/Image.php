<?php

include_once "Model.php";

class Image extends Model {
    public string $name;
    public string $extension;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->name = $fields[self::getTable() . '.name'];
        $this->extension = $fields[self::getTable() . '.extension'];
    }

    public static function getTable(): string {
        return "images";
    }

    public static function getFields(): array {
        return ["id", "name", "extension"];
    }

    public function getAssoc(): array {
        return [
            self::getTable() . ".id" => $this->id,
            self::getTable() . ".name" => $this->name,
            self::getTable() . ".extension" => $this->extension,
        ];
    }

    public static function new(string $name, string $extension): ?Image {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $name));
        $values->add(new Value(self::getTable() . ".extension", $extension));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Image([
                self::getTable() . ".id" => $id,
                self::getTable() . ".name" => $name,
                self::getTable() . ".extension" => $extension,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $this->name));
        $values->add(new Value(self::getTable() . ".extension", $this->extension));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }

    public function getPath(): string {
        return "images/" . $this->id . "." . $this->extension;
    }
}