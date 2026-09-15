<?php

include_once "Models/Model.php";
include_once "Models/User.php";
include_once "Models/Group.php";

final class Group extends Model {
    public const TABLE = "groups";

    final public const id = self::TABLE . ".id";
    final public const name = self::TABLE . ".name";

    public string $name;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->name = $fields[self::name];
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::name => $this->name,
        ];
    }

    public static function new(string $name): ?self {
        $values = new Values();
        $values->add(new Value(self::name, $name));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::name => $name,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public static function getFromName(string $name): ?self {
        return self::get(new Where(new Equals(new Value(self::name, $name))));
    }
}