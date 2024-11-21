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
        ];
    }

    public static function new(User $user, Group $group): ?UserGroup {
        $values = new Values();
        $values->add(new Value(self::userID, $user->id));
        $values->add(new Value(self::groupID, $group->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new UserGroup([
                self::id => $id,
                self::userID => $user->id,
                self::groupID => $group->id,
            ]);
        } catch (Exception) {
            return null;
        }
    }
}