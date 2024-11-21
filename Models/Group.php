<?php

include_once "Model.php";
include_once "User.php";
include_once "Group.php";

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

    public static function new(string $name): ?Group {
        $values = new Values();
        $values->add(new Value(self::name, $name));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Group([
                self::id => $id,
                self::name => $name,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public static function getFromName(string $name): ?Group {
        $where = new Where();
        $where->addEquals(new Value(self::name, $name));
        return self::get($where);
    }
}