<?php

include_once "Model.php";

class User extends Model {
    public string $firstName;
    public string $lastName;
    public string $email;
    public ?string $phoneNumber;
    public ?string $birthDate;
    private ?string $token;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->firstName = $fields[self::getTable() . '.firstName'];
        $this->lastName = $fields[self::getTable() . '.lastName'];
        $this->email = $fields[self::getTable() . '.email'];
        $this->phoneNumber = $fields[self::getTable() . '.phoneNumber'] ?? null;
        $this->birthDate = $fields[self::getTable() . '.birthDate'] ?? null;
        $this->token = $fields[self::getTable() . '.token'] ?? null;
    }

    public static function getTable(): string {
        return "users";
    }

    public static function getFields(): array {
        return ["id", "firstName", "lastName", "email", "phoneNumber", "birthDate", "token"];
    }

    public function getAssoc(): array {
        return [
            self::getTable() . ".id" => $this->id,
            self::getTable() . ".firstName" => $this->firstName,
            self::getTable() . ".lastName" => $this->lastName,
            self::getTable() . ".email" => $this->email,
            self::getTable() . ".phoneNumber" => $this->phoneNumber,
            self::getTable() . ".birthDate" => $this->birthDate,
            self::getTable() . ".token" => $this->token,
        ];
    }

    public static function new(string $firstName, string $lastName, string $email, ?string $password = null, ?string $phoneNumber = null, ?string $birthDate = null): ?User {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".firstName", $firstName));
        $values->add(new Value(self::getTable() . ".lastName", $lastName));
        $values->add(new Value(self::getTable() . ".email", $email));
        $values->add(new Value(self::getTable() . ".phoneNumber", $phoneNumber));
        $values->add(new Value(self::getTable() . ".birthDate", $birthDate));
        $values->add(new Value(self::getTable() . ".password", $password, true));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            self::executeQuery("INSERT INTO users_groups (userID, groupID) VALUES (?, (SELECT id FROM groups WHERE name = 'registeredUsers'))", [$id]);
            return new User([
                self::getTable() . ".id" => $id,
                self::getTable() . ".firstName" => $firstName,
                self::getTable() . ".lastName" => $lastName,
                self::getTable() . ".email" => $email,
                self::getTable() . ".phoneNumber" => $phoneNumber,
                self::getTable() . ".birthDate" => $birthDate,
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".firstName", $this->firstName));
        $values->add(new Value(self::getTable() . ".lastName", $this->lastName));
        $values->add(new Value(self::getTable() . ".email", $this->email));
        $values->add(new Value(self::getTable() . ".phoneNumber", $this->phoneNumber));
        $values->add(new Value(self::getTable() . ".birthDate", $this->birthDate));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }

    /**
     * Get user based on the email and password
     */
    public static function getFromEmailPassword(string $email, string $password): ?User {
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".email", $email));
        $where->addEquals(new Value(self::getTable() . ".password", $password, true));
        return self::list($where)[0] ?? null;
    }

    /**
     * Retrieve a User object based on a token stored in a cookie.
     */
    public static function getFromCookie(): ?User {
        if (isset($_COOKIE['token'])) {
            $where = new Where();
            $where->addEquals(new Value(self::getTable() . ".token", $_COOKIE['token']));
            return self::list($where)[0] ?? null;
        } else {
            return null;
        }
    }

    public function getToken(): string {
        return $this->token;
    }

    public function setToken(string $token): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".token", $token));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }

    public function updatePassword(string $password): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".password", $password, true));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }

    public function hasRights(string $controller, string $action): bool {
        return self::getConnection()->execute_query("
            SELECT COUNT(users.id) FROM users
            INNER JOIN users_groups ON users_groups.userID = users.id
            INNER JOIN groups_actions ON groups_actions.groupID = users_groups.groupID
            INNER JOIN actions ON actions.id = groups_actions.actionID
            WHERE users.id = ?
            AND actions.action = ?
            AND actions.controller = ?
        ", [$this->id, $action, $controller])->fetch_row()[0];
    }
}