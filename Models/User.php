<?php

include_once "Model.php";

class User extends Model {
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $phoneNumber;
    public ?int $birthDate;
    public ?string $token;
    public ?string $password;

    /**
     * @return User[]
     */
    public static function list(): array {
        return Model::listAll("user", "User");
    }

    /**
     * @throws \Random\RandomException
     */
    public static function register(string $firstName, string $lastName, string $email, string $password, ?string $phoneNumber = null, ?int $birthDate = null): User|false {
        $token = bin2hex(random_bytes(16));  // Generate Random 16 Bytes or 128 Bits

        $user = new User();
        $values = new Values(false);
        $values->add("firstName", $user->firstName = $firstName);
        $values->add("lastName", $user->lastName = $lastName);
        $values->add("email", $user->email = $email);
        $values->add("phoneNumber", $user->phoneNumber = $phoneNumber);
        $values->add("birthDate", $user->birthDate = $birthDate);
        $values->add("password", $password);
        $values->add("token", $user->token = $token);

        try {
            Model::insertRow("users", $values);
            $user->id = self::getConnection()->insert_id;
            self::getConnection()->execute_query("INSERT INTO users_groups (userID, groupID) VALUES (?, (SELECT id FROM `groups` WHERE name = 'registeredUsers'))", [$user->id]);
            return $user;
        } catch (Exception $e) {
            var_dump($e);
            return false;
        }
    }

    public static function getFromId(int $id): User|false|null {
        $where = new Where();
        $where->addEquals("id", $id);
        return Model::getRows("users", $where)->fetch_object("User");
    }

    public static function getFromToken(string $token): User|false|null {
        $where = new Where();
        $where->addEquals("token", $token);
        return Model::getRows("users", $where)->fetch_object("User");
    }

    public static function getFromEmailPassword(string $email, string $password): User|false|null {
        $where = new Where();
        $where->addEquals("email", $email);
        $where->addEquals("password", $password);
        return Model::getRows("users", $where)->fetch_object("User");
    }

    public static function getFromCookie(): User|false {
        if (isset($_COOKIE['token'])) {
            return self::getFromToken($_COOKIE['token']) ?? false;
        } else {
            return false;
        }
    }

    public function save(): bool {
        $set = new Set();
        $set->add("firstName", $this->firstName);
        $set->add("lastName", $this->lastName);
        $set->add("email", $this->email);
        $set->add("phoneNumber", $this->phoneNumber);
        $set->add("birthDate", $this->birthDate);
        $set->add("password", $this->password);
        $set->add("token", $this->token);
        $where = new Where();
        $where->addEquals("id", $this->id);
        return Model::updateRow("users", $set, $where);
    }

    public function delete(): bool {
        $where = new Where();
        $where->addEquals("id", $this->id);
        return Model::deleteRow("users", $where);
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
}