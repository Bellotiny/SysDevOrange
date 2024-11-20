<?php

include_once "Model.php";

class Color extends Model {
    public const TABLE = "colors";

    public final const id = self::TABLE . ".id";
    public final const name = self::TABLE . ".name";
    public final const code = self::TABLE . ".code";
    public final const visibility = self::TABLE . ".visibility";

    public string $name;
    public string $code;
    public bool $visibility;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->name = $fields[self::name];
        $this->code = $fields[self::code];
        $this->visibility = (int) $fields[self::visibility];
    }

    public function toAssoc(): array {
        return [
            self::id => $this->id,
            self::name => $this->name,
            self::code => $this->code,
            self::visibility => $this->visibility,
        ];
    }

    public static function new(string $name, string $code, bool $visibility): ?Color {
        $values = new Values();
        $values->add(new Value(self::name, $name));
        $values->add(new Value(self::code, $code));
        $values->add(new Value(self::visibility, $visibility));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Color([
                self::id => $id,
                self::name => $name,
                self::code => $code,
                self::visibility => $visibility,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}