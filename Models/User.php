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
        $this->phoneNumber = $fields[self::phoneNumber];
        $this->birthDate = $fields[self::birthDate];
        $this->token = $fields[self::token];
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

    public static function new(string $firstName, string $lastName, string $email, ?string $password = null, ?string $phoneNumber = null, ?string $birthDate = null): ?self {
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
            $user = new self([
                self::id => $id,
                self::firstName => $firstName,
                self::lastName => $lastName,
                self::email => $email,
                self::phoneNumber => $phoneNumber,
                self::birthDate => $birthDate,
                self::token => null,
            ]);
            UserGroup::new($user, Group::getFromName("registeredUsers"));
            return $user;
        } catch (Exception $e) {
            echo($e);
            return null;
        }
    }

//    public function applyDiscount($firstName, $birthDate){
//        $birthDateTime = new DateTime($birthDate);
//        $birthDateTimeStart = clone $birthDateTime;
//        $birthDateTimeStart->setTime(8, 0, 0);
//
//        $birthDateTimeEnd = clone $birthDateTime;
//        $birthDateTimeEnd->setTime(16, 0, 0);
//        Discount::new($firstName, "birthday", $birthDateTimeStart->format('Y-m-d H:i:s'), $birthDateTimeEnd->format('Y-m-d H:i:s'));
//    }

    /**
     * Get user based on the email and password
     */
    public static function getFromEmailPassword(string $email, string $password): ?self {
        $where = (new Where(new Equals(new Value(self::email, $email))))
            ->addAnd(new Equals(new Value(self::password, $password, true)));
        return self::get($where);
    }

    /**
     * Get user based on the email only
     */
    public static function getFromEmail(string $email): ?self {
        return self::get(new Where(new Equals(new Value(self::email, $email))));
    }

    /**
     * Retrieve a User object based on a token
     */
    public static function getFromToken(string $token): ?self {
        return self::get(new Where(new Equals(new Value(self::token, $token))));
    }

    /**
     * Retrieve a User object based on a token stored in a cookie.
     */
    public static function getFromCookie(): ?self {
        if (isset($_COOKIE["token"])) {
            return self::getFromToken($_COOKIE["token"]);
        } else {
            return null;
        }
    }

    public function getToken(): ?string {
        return $this->token;
    }

    public function setToken(?string $token): bool {
        return self::update(
            (new Values())->add(new Value(self::token, $token)),
            new Where(new Equals(new Value(self::id, $this->id)))
        );
    }

    public function hasPassword(): bool {
        return (bool) self::select(new Where(new Equals(new Value(self::id, $this->id), true)));
    }

    public function updatePassword(string $password): bool {
        return self::update(
            (new Values())->add(new Value(self::password, $password, true)),
            new Where(new Equals(new Value(self::id, $this->id)))
        );
    }

    public function hasRights(string $controller, string $action): bool {
        $join = (new Join())
            ->addInner(UserGroup::getFields(), UserGroup::TABLE, UserGroup::userID, self::id)
            ->addInner(GroupAction::getFields(), GroupAction::TABLE, GroupAction::groupID, UserGroup::groupID)
            ->addInner(Action::getFields(), Action::TABLE, Action::id, GroupAction::actionID);
        $where = (new Where(new Equals(new Value(self::id, $this->id))))
            ->addAnd(new Equals(new Value(Action::controller, $controller)))
            ->addAnd(new Equals(new Value(Action::action, $action)));
        return is_array(self::select($where, $join)->fetch_assoc());
    }

    /**
     * @return Review[]
     */
    public function getReviews(): array {
        return Review::list(new Where(new Equals(new Value(Review::userID, $this->id))));
    }

    /**
     * @return Booking[]
     */
    public function getBookings(): array {
        return Booking::list(new Where(new Equals(new Value(Booking::userID, $this->id))));
    }

    /**
     * @return Availability[]
     */
    public function getAvailabilities(): array {
        $where = new Where(new Equals(new Value(Booking::userID, $this->id)));
        $order = new Order([Availability::timeSlot], true);
        return Availability::list($where, null, null, null, $order);
    }
}