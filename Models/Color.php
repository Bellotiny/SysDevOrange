<?php

include_once "Model.php";

final class Color extends Model {
    public const TABLE = "colors";

    final public const id = self::TABLE . ".id";
    final public const name = self::TABLE . ".name";
    final public const code = self::TABLE . ".code";
    final public const visibility = self::TABLE . ".visibility";

    public string $name;
    public string $code;
    public bool $visibility;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->name = $fields[self::name];
        $this->code = $fields[self::code];
        $this->visibility = $fields[self::visibility];
    }

    public function toAssoc(): array {
        return [
            self::id => $this->id,
            self::name => $this->name,
            self::code => $this->code,
            self::visibility => $this->visibility,
        ];
    }

    public static function new(string $name, string $code, bool $visibility): ?self {
        $values = new Values();
        $values->add(new Value(self::name, $name));
        $values->add(new Value(self::code, $code));
        $values->add(new Value(self::visibility, $visibility));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::name => $name,
                self::code => $code,
                self::visibility => $visibility,
            ]);
        } catch (Exception) {
            return null;
        }
    }
    public static function getFromName(String $name): ?self {
        return self::get(new Where(new Equals(new Value(self::name, $name))));
    }
}