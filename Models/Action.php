<?php

include_once "Models/Model.php";
include_once "Models/User.php";
include_once "Models/Group.php";

final class Action extends Model {
    public const TABLE = "actions";

    final public const id = self::TABLE . ".id";
    final public const controller = self::TABLE . ".controller";
    final public const action = self::TABLE . ".action";

    public string $controller;
    public string $action;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->controller = $fields[self::controller];
        $this->action = $fields[self::action];
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::controller => $this->controller,
            self::action => $this->action,
        ];
    }

    public static function new(string $controller, string $action): ?self {
        $values = new Values();
        $values->add(new Value(self::controller, $controller));
        $values->add(new Value(self::action, $action));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::controller => $controller,
                self::action => $action,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}