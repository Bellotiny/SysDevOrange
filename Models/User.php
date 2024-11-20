<?php

include_once "Model.php";
include_once "UserGroup.php";
include_once "GroupAction.php";
include_once "Action.php";

final class User extends Model {
    public const TABLE = "users";

    final public const id = self::TABLE . ".id";
    final public const firstName = self::TABLE . ".firstName";
    final public const lastName = self::TABLE . ".lastName";
    final public const email = self::TABLE . ".email";
    final public const phoneNumber = self::TABLE . ".phoneNumber";
    final public const birthDate = self::TABLE . ".birthDate";
    final public const token = self::TABLE . ".token";

    private const password = self::TABLE . ".password";

    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $phoneNumber;
    public ?string $birthDate;
    private ?string $token;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->firstName = $fields[self::firstName];
        $this->lastName = $fields[self::lastName];
        $this->email = $fields[self::email];
        $this->phoneNumber = $fields[self::phoneNumber] ?? null;
        $this->birthDate = $fields[self::birthDate] ?? null;
        $this->token = $fields[self::token] ?? null;
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::firstName => $this->firstName,
            self::lastName => $this->lastName,
            self::email => $this->email,
            self::phoneNumber => $this->phoneNumber,
            self::birthDate => $this->birthDate,
            self::token => $this->token,
        ];
    }

    public static function new(string $firstName, string $lastName, string $email, ?string $password = null, ?string $phoneNumber = null, ?string $birthDate = null): ?User {
        $values = new Values();
        $values->add(new Value(self::firstName, $firstName));
        $values->add(new Value(self::lastName, $lastName));
        $values->add(new Value(self::email, $email));
        $values->add(new Value(self::phoneNumber, $phoneNumber));
        $values->add(new Value(self::birthDate, $birthDate));
        $values->add(new Value(self::password, $password, true));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            $user = new User([
                self::id => $id,
                self::firstName => $firstName,
                self::lastName => $lastName,
                self::email => $email,
                self::phoneNumber => $phoneNumber,
                self::birthDate => $birthDate,
            ]);
            UserGroup::new($user, Group::getFromName("registeredUsers"));
            return $user;
        } catch (Exception) {
            return null;
        }
    }

    /**
     * Get user based on the email and password
     */
    public static function getFromEmailPassword(string $email, string $password): ?User {
        $where = new Where();
        $where->addEquals(new Value(self::email, $email));
        $where->addEquals(new Value(self::password, $password, true));
        return self::get($where);
    }

    /**
     * Retrieve a User object based on a token stored in a cookie.
     */
    public static function getFromCookie(): ?User {
        if (isset($_COOKIE['token'])) {
            $where = new Where();
            $where->addEquals(new Value(self::token, $_COOKIE['token']));
            return self::get($where);
        } else {
            return null;
        }
    }

    public function getToken(): string {
        return $this->token;
    }

    public function setToken(string $token): bool {
        $values = new Values();
        $values->add(new Value(self::token, $token));
        $where = new Where();
        $where->addEquals(new Value(self::id, $this->id));
        return self::update($values, $where);
    }

    public function updatePassword(string $password): bool {
        $values = new Values();
        $values->add(new Value(self::password, $password, true));
        $where = new Where();
        $where->addEquals(new Value(self::id, $this->id));
        return self::update($values, $where);
    }

    public function hasRights(string $controller, string $action): bool {
        $join = (new Join())
            ->addInner(UserGroup::getFields(), UserGroup::TABLE, UserGroup::userID, self::id)
            ->addInner(GroupAction::getFields(), GroupAction::TABLE, GroupAction::groupID, UserGroup::groupID)
            ->addInner(Action::getFields(), Action::TABLE, Action::id, GroupAction::actionID);
        $where = (new Where())
            ->addEquals(new Value(self::id, $this->id))
            ->addEquals(new Value(Action::controller, $controller))
            ->addEquals(new Value(Action::action, $action));
        return is_array(self::select($join, $where)->fetch_assoc());
    }

    /**
     * Get Reviews
     * @return Review[]
     */
    public function getReviews(): array {
        $where = new Where();
        $where->addEquals(new Value(Review::userID, $this->id));
        return Review::list($where);
    }

    /**
     * Get Bookings
     * @return Booking[]
     */
    public function getBookings(): array {
        $where = new Where();
        $where->addEquals(new Value(Booking::userID, $this->id));
        return Booking::list($where);
    }
}