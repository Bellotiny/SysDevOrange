<?php

include_once "../Models/Model.php";

class User extends Model {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private ?string $phoneNumber;
    private ?string $token;

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
        $token = random_bytes(16);  // Generate Random 16 Bytes or 128 Bits

        $user = new User();
        $user->firstName = $firstName;
        $user->lastName = $lastName;
        $user->email = $email;
        $user->phoneNumber = $phoneNumber;
        $user->token = $token;

        Model::insertRow(
            "users",
            ["firstName", "lastName", "email", "phoneNumber", "password", "token"],
            [$firstName, $lastName, $email, $phoneNumber, $password, $token],
            true
        );
        if (Model::getConnection()->affected_rows == 0) {
            return false;
        }
        return $user;
    }

    public static function getFromId(int $id): User|bool {
        return Model::getRows("users", "id = ?", [$id])->fetch_object("User");
    }

    public static function getFromToken(string $token): User|bool {
        return Model::getRows("users", "token = ?", [$token])->fetch_object("User");
    }

    public static function getFromEmailPassword(string $email, string $password): User|bool {
        return Model::getRows("users", Model::multiEquals(["email", "password"]), [$email, $password])->fetch_object("User");
    }

    public function update(?string $firstName = null, ?string $lastName = null, ?string $email = null, ?string $password = null, ?string $phoneNumber = null): bool {
        $columns = [];
        $values = [];
        if (isset($firstName)) {
            $columns[] = "firstName";
            $values[] = $firstName;
        }
        if (isset($lastName)) {
            $columns[] = "lastName";
            $values[] = $lastName;
        }
        if (isset($email)) {
            $columns[] = "email";
            $values[] = $email;
        }
        if (isset($password)) {
            $columns[] = "password";
            $values[] = $password;
        }
        if (isset($phoneNumber)) {
            $columns[] = "phoneNumber";
            $values[] = $phoneNumber;
        }
        return Model::updateRow("users", "id = ?", [$this->id], $columns, $values);
    }

    public function delete(): bool {
        return Model::deleteRow("users", "id = ?", [$this->id]);
    }
}