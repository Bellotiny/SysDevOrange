<?php

include_once "Model.php";

class User extends Model {
    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $phoneNumber;
    public ?string $birthDate;
    public ?string $token;

    protected static function getTable(): string {
        return "users";
    }

    public static function register(string $firstName, string $lastName, string $email, ?string $password = null, ?string $phoneNumber = null, ?string $birthDate = null): User|false {
        $user = new User();
        $values = new Values();
        $values->add(new Value($user->firstName = $firstName, "firstName"));
        $values->add(new Value($user->lastName = $lastName, "lastName"));
        $values->add(new Value($user->email = $email, "email"));
        $values->add(new Value($user->phoneNumber = $phoneNumber, "phoneNumber"));
        $values->add(new Value($user->birthDate = $birthDate, "birthDate"));
        $values->add(new Value($password, "password", true));

        try {
            self::insertRow($values, false);
            $user->id = self::getConnection()->insert_id;
            self::executeQuery("INSERT INTO users_groups (userID, groupID) VALUES (?, (SELECT id FROM `groups` WHERE name = 'registeredUsers'))", [$user->id]);
            return $user;
        } catch (Exception) {
            return false;
        }
    }

    public static function getFromEmailPassword(string $email, string $password): User|false {
        $where = new Where();
        $where->addEquals(new Value($email, "email"));
        $where->addEquals(new Value($password, "password", true));
        return self::getRows($where)->fetch_object("User");
    }

    public static function getFromCookie(): User|false {
        if (isset($_COOKIE['token'])) {
            $where = new Where();
            $where->addEquals(new Value($_COOKIE['token'], "token"));
            return self::getRows($where)->fetch_object("User") ?? false;
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
        $values->add(new Value($this->token, "token"));
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::updateRows($values, $where);
    }

    public function updatePassword(string $password): bool {
        $values = new Values();
        $values->add(new Value($password, "password", true));
        $where = new Where();
        $where->addEquals(new Value($this->id, "id"));
        return self::updateRows($values, $where);
    }
}