<?php

include_once "Model.php";
include_once "Group.php";
include_once "Action.php";

final class GroupAction extends Model {
    public const TABLE = "groups_actions";

    final public const id = self::TABLE . ".id";
    final public const groupID = self::TABLE . ".groupID";
    final public const actionID = self::TABLE . ".actionID";

    public Group $group;
    public Action $action;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->group = new Group($fields);
        $this->action = new Action($fields);
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::groupID => $this->group->id,
            self::actionID => $this->action->id,
        ];
    }

    public static function new(Group $group, Action $action): ?GroupAction {
        $values = new Values();
        $values->add(new Value(self::groupID, $group->id));
        $values->add(new Value(self::actionID, $action->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new GroupAction([
                self::id => $id,
                self::groupID => $group->id,
                self::actionID => $action->id,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}