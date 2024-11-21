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

    protected static function getJoin(): ?Join {
        return (new Join())
            ->addInner(Group::getFields(), Group::TABLE, Group::id, self::groupID)
            ->addInner(Action::getFields(), Action::TABLE, Action::id, self::actionID);
    }

    public static function new(Group $group, Action $action): ?self {
        $values = new Values();
        $values->add(new Value(self::groupID, $group->id));
        $values->add(new Value(self::actionID, $action->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::groupID => $group->id,
                self::actionID => $action->id,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}