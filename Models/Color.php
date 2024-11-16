<?php

include_once "Model.php";

class Color extends Model {
    public string $name;
    public string $code;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->name = $fields[self::getTable() . '.name'];
        $this->code = $fields[self::getTable() . '.code'];
    }

    public static function getTable(): string {
        return "colors";
    }

    public static function getFields(): array {
        return ["id", "name", "code"];
    }

    public static function new(string $name, string $code): ?Color {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $name));
        $values->add(new Value(self::getTable() . ".code", $code));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Color([
                self::getTable() . ".id" => $id,
                self::getTable() . ".name" => $name,
                self::getTable() . ".code" => $code,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".name", $this->name));
        $values->add(new Value(self::getTable() . ".code", $this->code));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }
}