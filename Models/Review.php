<?php

include_once "Model.php";
include_once "Models/Image.php";

class Review extends Model {
    public const TABLE = "reviews";

    public final const id = self::TABLE . ".id";
    public final const title = self::TABLE . ".title";
    public final const message = self::TABLE . ".message";
    public final const date = self::TABLE . ".date";
    public final const userID = self::TABLE . ".userID";
    public final const imageID = self::TABLE . ".imageID";

    public string $title;
    public string $message;
    public string $date;
    public User $user;
    public ?Image $image;

    public function __construct(array $fields) {
        $this->id = $fields[self::id];
        $this->title = $fields[self::title];
        $this->message = $fields[self::message];
        $this->date = $fields[self::date];
        $this->user = new User($fields);
        $this->image = ($fields[Image::id] ? new Image($fields) : null);
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::title => $this->title,
            self::message => $this->message,
            self::date => $this->date,
            self::userID => $this->user->id,
            self::imageID => $this->image?->id,
        ];
    }

    protected static function getJoin(): ?Join {
        return (new Join())
            ->addInner(User::getFields(), User::TABLE, User::id, self::userID)
            ->addLeft(Image::getFields(), Image::TABLE, Image::id, self::imageID);
    }

    public static function new(User $user, string $title, string $message, string $date, ?Image $image = null): ?Review {
        $values = new Values();
        $values->add(new Value(self::title, $title));
        $values->add(new Value(self::message, $message));
        $values->add(new Value(self::date, $date));
        $values->add(new Value(self::userID, $user->id));
        $values->add(new Value(self::imageID, $image->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new Review([
                self::id => $id,
                self::title => $title,
                self::message => $message,
                self::date => $date,
                self::userID => $user->id,
                self::imageID => $image->id,
                ...$user->toAssoc(),
                ...($image ? $image->getAssoc() : [])
            ]);
        } catch (Exception) {
            return null;
        }
    }
}