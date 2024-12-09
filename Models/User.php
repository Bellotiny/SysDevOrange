<?php

include_once "Models/Model.php";
include_once "Models/UserGroup.php";
include_once "Models/GroupAction.php";
include_once "Models/Token.php";
include_once "Models/Review.php";
include_once "Models/Booking.php";
include_once "Models/Availability.php";

final class User extends Model {
    public const TABLE = "users";

    final public const id = self::TABLE . ".id";
    final public const firstName = self::TABLE . ".firstName";
    final public const lastName = self::TABLE . ".lastName";
    final public const email = self::TABLE . ".email";
    final public const phoneNumber = self::TABLE . ".phoneNumber";
    final public const birthDate = self::TABLE . ".birthDate";

    private const password = self::TABLE . ".password";

    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $phoneNumber;
    public ?string $birthDate;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->firstName = $fields[self::firstName];
        $this->lastName = $fields[self::lastName];
        $this->email = $fields[self::email];
        $this->phoneNumber = $fields[self::phoneNumber];
        $this->birthDate = $fields[self::birthDate];
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::firstName => $this->firstName,
            self::lastName => $this->lastName,
            self::email => $this->email,
            self::phoneNumber => $this->phoneNumber,
            self::birthDate => $this->birthDate,
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
            ]);
            UserGroup::new($user, Group::getFromName("registeredUsers"));
            return $user;
        } catch (Exception $e) {
            echo($e);
            return null;
        }
    }

    /**
     * Get user based on the email only
     */
    public static function getFromEmail(string $email): ?self {
        return self::get(new Where(new Equals(new Value(self::email, $email))));
    }

    /**
     * Get user based on the email and password
     */
    public static function getFromEmailPassword(string $email, string $password): ?self {
        $where = (new Where(new Equals(new Value(self::email, $email))))
            ->addAnd(new Equals(new Value(self::password, $password, true)));
        return self::get($where);
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

    /**
     * @throws Random\RandomException
     */
    public function generateToken(): string {
        $token = $this->id . "06BlK0dFkhC1LVf9" . bin2hex(random_bytes(16));
        Token::new($token, $this);
        setcookie("token", $token, time() + 34560000, "/");
        return $token;
    }

    public function deleteAllTokens(): bool {
        setcookie("token", "", -1, "/");  // Remove cookie "token" from the user's browser
        return Token::delete(new Where(new Equals(new Value(Token::userID, $this->id))));
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