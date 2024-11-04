<?php

use Random\RandomException;

include_once "Model.php";

class User extends Model {
    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $phoneNumber;
    public ?string $birthDate;
    public ?string $token;
    public ?string $password;

    protected static function getTable(): string {
        return "users";
    }

    /**
     * @throws RandomException
     */
    public static function register(string $firstName, string $lastName, string $email, string $password, ?string $phoneNumber = null, ?string $birthDate = null): User|false {
        $token = bin2hex(random_bytes(16));  // Generate Random 16 Bytes or 128 Bits

        $user = new User();
        $values = new Values();
        $values->add(new Value($user->firstName = $firstName, "firstName"));
        $values->add(new Value($user->lastName = $lastName, "lastName"));
        $values->add(new Value($user->email = $email, "email"));
        $values->add(new Value($user->phoneNumber = $phoneNumber, "phoneNumber"));
        $values->add(new Value($user->birthDate = $birthDate, "birthDate"));
        $values->add(new Value($password, "password", true));
        $values->add(new Value($user->token = $token, "token"));

        try {
            self::insertRow($values, false);
            $user->id = self::getConnection()->insert_id;
            self::executeQuery("INSERT INTO users_groups (userID, groupID) VALUES (?, (SELECT id FROM `groups` WHERE name = 'registeredUsers'))", [$user->id]);
            return $user;
        } catch (Exception) {
            return false;
        }
    }

    public static function getFromToken(string $token): User|false|null {
        $where = new Where();
        $where->addEquals(new Value($token, "token"));
        return self::getRows($where)->fetch_object("User");
    }

    public static function getFromEmailPassword(string $email, string $password): User|false|null {
        $where = new Where();
        $where->addEquals(new Value($email, "email"));
        $where->addEquals(new Value($password, "password", true));
        return self::getRows($where)->fetch_object("User");
    }

    public static function getFromCookie(): User|false {
        if (isset($_COOKIE['token'])) {
            return self::getFromToken($_COOKIE['token']) ?? false;
        } else {
            return false;
        }
    }

    public function verifyRights(string $controller, string $action): bool {
        return self::getConnection()->execute_query("SELECT COUNT(users.id) FROM users
            INNER JOIN users_groups ON users_groups.userID = users.id
            INNER JOIN group_actions ON group_actions.groupID = users_groups.groupID
            INNER JOIN actions ON actions.id = group_actions.actionID

            WHERE users.id = ?
            AND actions.action = ?
            AND actions.controller = ?", [$this->id, $action, $controller])->fetch_row()[0];
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value($this->firstName, "firstName"));
        $values->add(new Value($this->lastName, "lastName"));
        $values->add(new Value($this->email, "email"));
        $values->add(new Value($this->phoneNumber, "phoneNumber"));
        $values->add(new Value($this->birthDate, "birthDate"));
        $values->add(new Value($this->password, "password"));
        $values->add(new Value($this->token, "token"));
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::updateRows($values, $where);
    }
}