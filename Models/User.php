<?php

include_once "../Models/Model.php";

class User extends Model {
    private int $id;
    private string $firstName;
    private string $lastName;
    private string $email;
    private ?string $phoneNumber;
    private ?string $password;
    private ?string $token;

    /**
     * @return User[]
     */
    public static function list(): array {
        return Model::listAll("user", "User");
    }

    public static function getFromId(int $id): User {
        return Model::getAllWhere("users", "User", "id", $id);
    }

    public static function getFromToken(string $token): User {
        return Model::getAllWhere("users", "User", "token", $token);
    }


    public function insert(): bool {
        return Model::insertMany(
            "users",
            "id, firstName, lastName, email, phoneNumber, password, token",
            $this->id . ", " . $this->firstName . ", " . $this->lastName . ", " . $this->email . ", " . $this->phoneNumber . ", " . $this->password . ", " . $this->token);
    }

    public function delete(): bool {
        return Model::deleteAllWhere("users", "id", $this->id);
    }
}