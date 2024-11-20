<?php

include_once "Model.php";

class User extends Model {
    public const TABLE = "users";

    public final const id = self::TABLE . ".id";
    public final const firstName = self::TABLE . ".firstName";
    public final const lastName = self::TABLE . ".lastName";
    public final const email = self::TABLE . ".email";
    public final const phoneNumber = self::TABLE . ".phoneNumber";
    public final const birthDate = self::TABLE . ".birthDate";
    public final const token = self::TABLE . ".token";

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
            self::executeQuery("INSERT INTO users_groups (userID, groupID) VALUES (?, (SELECT id FROM `groups` WHERE name = 'registeredUsers'))", [$id]);
            return new User([
                self::id => $id,
                self::firstName => $firstName,
                self::lastName => $lastName,
                self::email => $email,
                self::phoneNumber => $phoneNumber,
                self::birthDate => $birthDate,
            ]);
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
        return self::getConnection()->execute_query("
            SELECT COUNT(users.id) FROM `" . self::TABLE . "`
            INNER JOIN users_groups ON users_groups.userID = " .  self::id . "
            INNER JOIN group_actions ON group_actions.groupID = users_groups.groupID
            INNER JOIN actions ON actions.id = group_actions.actionID
            WHERE " . self::id . " = ?
            AND actions.action = ?
            AND actions.controller = ?
        ", [$this->id, $action, $controller])->fetch_row()[0];
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