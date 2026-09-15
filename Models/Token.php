<?php

include_once "Models/Model.php";
include_once "Models/User.php";

final class Token extends Model {
    public const TABLE = "tokens";

    final public const id = self::TABLE . ".id";
    final public const token = self::TABLE . ".token";
    final public const userID = self::TABLE . ".userID";

    public User $user;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->user = new User($fields);
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            ...$this->user->toAssoc(),
        ];
    }

    public static function getJoin(): ?Join {
        return (new Join())->addLeft(User::getFields(), User::TABLE, User::id, self::userID, User::getJoin());
    }

    public static function new(string $token, User $user): ?self {
        $values = new Values();
        $values->add(new Value(self::token, $token, true));
        $values->add(new Value(self::userID, $user->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::token => $token,
                ...$user->toAssoc(),
            ]);
        } catch (Exception) {
            return null;
        }
    }

    /**
     * Get a token object with the given token if it already exists in the database
     */
    public static function getFromToken(string $token): ?self {
        return self::get(new Where(new Equals(new Value(self::token, $token, true))));
    }

    /**
     * Retrieve a Token object from the token stored in the cookie if it exists.
     */
    public static function getFromCookie(): ?self {
        return isset($_COOKIE["token"]) ? self::getFromToken($_COOKIE["token"]) : null;
    }
}