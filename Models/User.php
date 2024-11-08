<?php

include_once "Model.php";

class User extends Model {
    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $phoneNumber;
    public ?string $birthDate;

    private ?string $token;

    protected static function getTable(): string {
        return "users";
    }

    public static function new(string $firstName, string $lastName, string $email, ?string $password = null, ?string $phoneNumber = null, ?string $birthDate = null): ?User {
        $user = new User();
        $values = new Values();
        $values->add(new Value("firstName", $user->firstName = $firstName));
        $values->add(new Value("lastName", $user->lastName = $lastName));
        $values->add(new Value("email", $user->email = $email));
        $values->add(new Value("phoneNumber", $user->phoneNumber = $phoneNumber));
        $values->add(new Value("birthDate", $user->birthDate = $birthDate));
        $values->add(new Value("password", $password, true));

        try {
            self::insertRow($values, false);
            $user->id = self::getConnection()->insert_id;
            self::executeQuery("INSERT INTO users_groups (userID, groupID) VALUES (?, (SELECT id FROM `groups` WHERE name = 'registeredUsers'))", [$user->id]);
            return $user;
        } catch (Exception) {
            return null;
        }
    }

    /**
     * Get user based on the token
     */
    public static function getFromToken(string $token): ?User {
        $where = new Where();
        $where->addEquals(new Value("token", $token));
        return self::getRows($where)->fetch_object("User") ?? null;
    }

    /**
     * Get user based on the email and password
     */
    public static function getFromEmailPassword(string $email, string $password): ?User {
        $where = new Where();
        $where->addEquals(new Value("email", $email));
        $where->addEquals(new Value("password", $password, true));
        return self::getRows($where)->fetch_object("User") ?? null;
    }

    /**
     * Retrieve a User object based on a token stored in a cookie.
     */
    public static function getFromCookie(): ?User {
        if (isset($_COOKIE['token'])) {
            $where = new Where();
            $where->addEquals(new Value("token", $_COOKIE['token']));
            return self::getRows($where)->fetch_object("User") ?? null;
        } else {
            return null;
        }
    }

    public function hasRights(string $controller, string $action): bool {
        return self::getConnection()->execute_query("
            SELECT COUNT(users.id) FROM users
            INNER JOIN users_groups ON users_groups.userID = users.id
            INNER JOIN group_actions ON group_actions.groupID = users_groups.groupID
            INNER JOIN actions ON actions.id = group_actions.actionID
            WHERE users.id = ?
            AND actions.action = ?
            AND actions.controller = ?
        ", [$this->id, $action, $controller])->fetch_row()[0];
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value("firstName", $this->firstName));
        $values->add(new Value("lastName", $this->lastName));
        $values->add(new Value("email", $this->email));
        $values->add(new Value("phoneNumber", $this->phoneNumber));
        $values->add(new Value("birthDate", $this->birthDate));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }

    public function getToken(): string {
        return $this->token;
    }

    public function setToken(string $token): bool {
        $values = new Values();
        $values->add(new Value("token", $token));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }

    public function updatePassword(string $password): bool {
        $values = new Values();
        $values->add(new Value("password", $password, true));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}