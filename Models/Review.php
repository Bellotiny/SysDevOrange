<?php

include_once "Model.php";
include_once "Image.php";

final class Review extends Model {
    public const TABLE = "reviews";

    final public const id = self::TABLE . ".id";
    final public const title = self::TABLE . ".title";
    final public const message = self::TABLE . ".message";
    final public const date = self::TABLE . ".date";
    final public const userID = self::TABLE . ".userID";
    final public const imageID = self::TABLE . ".imageID";

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
        $this->image = isset($fields[Image::id]) ? new Image($fields) : null;
    }

    protected function toAssoc(): array {
        return [
            self::id => $this->id,
            self::title => $this->title,
            self::message => $this->message,
            self::date => $this->date,
            self::userID => $this->user->id,
            self::imageID => $this->image?->id,
            ...$this->user->toAssoc(),
            ...($this->image ? $this->image->toAssoc() : []),
            
        ];
    }

    public static function getJoin(): ?Join {
        return (new Join())
            ->addInner(User::getFields(), User::TABLE, User::id, self::userID, User::getJoin())
            ->addLeft(Image::getFields(), Image::TABLE, Image::id, self::imageID, Image::getJoin());
    }

    public static function new(User $user, string $title, string $message, string $date, ?Image $image = null): ?self {
        $values = new Values();
        $values->add(new Value(self::title, $title));
        $values->add(new Value(self::message, $message));
        $values->add(new Value(self::date, $date));
        $values->add(new Value(self::userID, $user->id));
        $values->add(new Value(self::imageID, $image->id));
        try {
            self::insert($values, false);
            $id = self::getConnection()->insert_id;
            return new self([
                self::id => $id,
                self::title => $title,
                self::message => $message,
                self::date => $date,
                ...$user->toAssoc(),
                ...($image ? $image->toAssoc() : [])
            ]);
        } catch (Exception) {
            return null;
        }
    }
}