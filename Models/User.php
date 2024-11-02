<?php

include_once "Model.php";

class User extends Model {
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $phoneNumber;
    public ?string $token;

    /**
     * @return User[]
     */
    public static function list(): array {
        return Model::listAll("user", "User");
    }

    /**
     * @throws \Random\RandomException
     */
    public static function register(string $firstName, string $lastName, string $email, string $password, ?string $phoneNumber = null): User|false {
        $token = bin2hex(random_bytes(16));  // Generate Random 16 Bytes or 128 Bits

        $user = new User();
        $values = new Values(false);
        $values->add("firstName", $user->firstName = $firstName);
        $values->add("lastName", $user->lastName = $lastName);
        $values->add("email", $user->email = $email);
        $values->add("phoneNumber", $user->phoneNumber = $phoneNumber);
        $values->add("password", $password);
        $values->add("token", $user->token = $token);

        try {
            Model::insertRow("users", $values);
            return $user;
        } catch (Exception) {
            return false;
        }
    }

    public static function getFromId(int $id): User|null {
        $where = new Where();
        $where->addEquals("id", $id);
        return Model::getRows("users", $where)->fetch_object("User");
    }

    public static function getFromToken(string $token): User|bool {
        $where = new Where();
        $where->addEquals("token", $token);
        return Model::getRows("users", $where)->fetch_object("User");
    }

    public static function getFromEmailPassword(string $email, string $password): User|bool|null {
        $where = new Where();
        $where->addEquals("email", $email);
        $where->addEquals("password", $password);
        return Model::getRows("users", $where)->fetch_object("User");
    }

    public function update(?string $firstName = null, ?string $lastName = null, ?string $email = null, ?string $password = null, ?string $phoneNumber = null): bool {
        $set = new Set();
        if (isset($firstName)) { $set->add("firstName", $firstName); }
        if (isset($lastName)) { $set->add("lastName", $lastName);}
        if (isset($email)) { $set->add("email", $email); }
        if (isset($password)) { $set->add("password", $password); }
        if (isset($phoneNumber)) { $set->add("phoneNumber", $phoneNumber); }
        $where = new Where();
        $where->addEquals("id", $this->id);
        return Model::updateRow("users", $set, $where);
    }

    public function delete(): bool {
        $where = new Where();
        $where->addEquals("id", $this->id);
        return Model::deleteRow("users", $where);
    }
}