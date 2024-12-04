<?php

include_once "Model.php";
include_once "User.php";
include_once "Group.php";

final class UserGroup extends Model {
    public const TABLE = "users_groups";

    final public const id = self::TABLE . ".id";
    final public const userID = self::TABLE . ".userID";
    final public const groupID = self::TABLE . ".groupID";

    public User $user;
    public Group $group;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->user = new User($fields);
        $this->group = new Group($fields);
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::userID => $this->user->id,
            self::groupID => $this->group->id,
            ...$this->user->toAssoc(),
            ...$this->group->toAssoc(),
        ];
    }

    public static function getJoin(): ?Join {
        return (new Join())
            ->addLeft(User::getFields(), User::TABLE, User::id, self::userID, User::getJoin())
            ->addLeft(Group::getFields(), Group::TABLE, Group::id, self::groupID, Group::getJoin());
    }

    public static function new(User $user, Group $group): ?self {
        $values = new Values();
        $values->add(new Value(self::userID, $user->id));
        $values->add(new Value(self::groupID, $group->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                ...$user->toAssoc(),
                ...$group->toAssoc(),
            ]);
        } catch (Exception) {
            return null;
        }
    }
}