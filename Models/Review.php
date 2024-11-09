<?php

include_once "Model.php";

class Review extends Model {
    public int $userID;
    public string $title;
    public string $message;
    public string $date;
    public ?int $imageID;

    public static function getTable(): string {
        return "reviews";
    }

    public static function new(int $userID, string $title, string $message, string $date, ?int $imageID = null): ?Review {
        $review = new Review();
        $values = new Values();
        $values->add(new Value("userID", $review->userID = $userID));
        $values->add(new Value("title", $review->title = $title));
        $values->add(new Value("message", $review->message = $message));
        $values->add(new Value("date", $review->date = $date));
        $values->add(new Value("imageID", $review->imageID = $imageID));
        try {
            self::insertRow($values, false);
            $review->id = self::getConnection()->insert_id;
            return $review;
        } catch (Exception) {
            return null;
        }
    }

    public function save(): bool {
        $values = new Values();
        $values->add(new Value("userID", $this->userID));
        $values->add(new Value("title", $this->title));
        $values->add(new Value("message", $this->message));
        $values->add(new Value("date", $this->date));
        $values->add(new Value("imageID", $this->imageID));
        $where = new Where();
        $where->addEquals(new Value("id", $this->id));
        return self::updateRows($values, $where);
    }
}