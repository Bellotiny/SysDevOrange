<?php

include_once "Model.php";

class Color extends Model {
    public string $name;
    public string $code;

    protected static function getTable(): string {
        return "colors";
    }

    public static function new(string $name, string $code): Color|false {
        $color = new Color();
        $values = new Values();
        $values->add(new Value("name", $color->name = $name));
        $values->add(new Value("code", $color->code = $code));

        try {
            self::insertRow($values, false);
            $color->id = self::getConnection()->insert_id;
            return $color;
        } catch (Exception) {
            return false;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value("name", $this->name));
        $values->add(new Value("code", $this->code));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}