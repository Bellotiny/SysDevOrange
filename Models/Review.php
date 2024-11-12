<?php

include_once "Model.php";
include_once "Models/Image.php";

class Review extends Model {
    public string $title;
    public string $message;
    public string $date;
    public User $user;
    public ?Image $image;

    public function __construct(array $fields) {
        $this->id = $fields[self::getTable() . '.id'];
        $this->title = $fields[self::getTable() . '.title'];
        $this->message = $fields[self::getTable() . '.message'];
        $this->date = $fields[self::getTable() . '.date'];
        $this->user = new User($fields);
        $this->image = ($fields[self::getTable() . '.imageID'] ? new Image($fields) : null);
    }

    public static function getTable(): string {
        return "reviews";
    }

    public static function getFields(): array {
        return ["id", "title", "message", "date", "userID", "imageID"];
    }

    protected static function select(?Where $where = null, ?int $limit = null, ?int $offset = null): bool|mysqli_result {
        return self::executeQuery(
            "SELECT " . self::getSelectFields() . ", " . User::getSelectFields() . ", " . Image::getSelectFields() . "  FROM " . self::getTable() .
            " INNER JOIN " . User::getTable() . " ON " . self::getTable() . ".userID = " . User::getTable() . ".id" .
            " LEFT JOIN " . Image::getTable() . " ON " . self::getTable() . ".imageID = " . Image::getTable() . ".id" .
            ($where ?? "") .
            ($limit ? " LIMIT " . $limit : "") .
            ($offset ? " OFFSET " . $offset : ""),
            ($where ? $where->getArgs() : [])
        );
    }

    public static function new(User $user, string $title, string $message, string $date, ?Image $image = null): ?Review {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".title", $title));
        $values->add(new Value(self::getTable() . ".message", $message));
        $values->add(new Value(self::getTable() . ".date", $date));
        $values->add(new Value(self::getTable() . ".userID", $user->id));
        $values->add(new Value(self::getTable() . ".imageID", $image->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Review([
                self::getTable() . ".id" => $id,
                self::getTable() . ".title" => $title,
                self::getTable() . ".message" => $message,
                self::getTable() . ".date" => $date,
                self::getTable() . ".userID" => $user->id,
                self::getTable() . ".imageID" => $image->id,
                ...$user->getAssoc(),
                ...($image ? $image->getAssoc() : [])
            ]);
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value(self::getTable() . ".title", $this->title));
        $values->add(new Value(self::getTable() . ".message", $this->message));
        $values->add(new Value(self::getTable() . ".date", $this->date));
        $values->add(new Value(self::getTable() . ".userID", $this->user->id));
        $values->add(new Value(self::getTable() . ".imageID", $this->image->id));
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".id", $this->id));
        return self::update($values, $where);
    }

    /**
     * Get reviews based on User
     * @return Review[]
     */
    public static function getFromUser(User $user): array {
        $where = new Where();
        $where->addEquals(new Value(self::getTable() . ".userID", $user->id));
        return self::list($where) ?? [];
    }
}