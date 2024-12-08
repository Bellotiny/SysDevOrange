<?php

include_once "Models/Review.php";
include_once "Models/Booking.php";

final class Reviews extends Controller {
    final public const ADD = "add";
    final public const LIST = "list";
    final public const EDIT = "edit";
    final public const DELETE = "delete";

    public function __construct(?string $action = null) {
        parent::__construct($action ?? self::LIST);
    }

    public function route(): void {
        switch ($this->action) {
            case self::ADD:
                if (!$this->verifyRights()) {
                    break;
                }
                if (count($this->user->getBookings()) <= count($this->user->getReviews())) {
                    $this->render(["error" => "You are only allowed 1 review per booking. You currently only have " . count($this->user->getBookings()) . " bookings."]);
                    break;
                }
                if (!isset($_POST["title"]) || !isset($_POST["message"]) || !isset($_FILES["image"])) {
                    $this->render();
                    break;
                }
                if ($_POST["title"] === "") {
                    $this->render(["error" => "Title cannot be empty", "message" => $_POST["message"]]);
                    break;
                }
                if ($_POST["message"] === "") {
                    $this->render(["error" => "Message cannot be empty", "title" => $_POST["title"]]);
                    break;
                }
                $image = null;
                if ($_FILES["image"]["name"] !== "" && $_FILES["image"]["tmp_name"] !== "") {
                    $image = Image::new(
                        pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME),
                        pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION),
                    );
                    move_uploaded_file($_FILES["image"]["tmp_name"], $image->getPath());
                }
                Review::new($this->user, $_POST["title"], $_POST["message"], date("Y-m-d H:i:s"), $image);
                $this->redirect();
                break;
            case self::EDIT:
                if (!$this->verifyRights()) {
                    break;
                }
                if ($this->id === null) {
                    $this->redirect();
                    break;
                }
                $review = Review::getfromId($this->id);
                if ($review === null) {
                    $this->redirect();
                    break;
                }
                if (!isset($_POST["title"]) || !isset($_POST["message"]) || !isset($_FILES["image"])) {
                    $this->render(["review" => $review]);
                    break;
                }
                if ($_POST["title"] === "") {
                    $this->render(["error" => "Title cannot be empty", "message" => $_POST["message"]]);
                    break;
                }
                if ($_POST["message"] === "") {
                    $this->render(["error" => "Message cannot be empty", "title" => $_POST["title"]]);
                    break;
                }
                $review->title = $_POST["title"];
                $review->message = $_POST["message"];
                if ($_FILES["image"]["name"] !== "" && $_FILES["image"]["tmp_name"] !== "") {
                    if ($review->image) {
                        if ($review->image->extension !== pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION) && file_exists($review->image->getPath())) {
                            unlink($review->image->getPath());
                        }
                        $review->image->name = pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME);
                        $review->image->extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                        $review->image->save();
                    } else {
                        $review->image = Image::new(
                            pathinfo($_FILES["image"]["name"], PATHINFO_FILENAME),
                            pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION),
                        );
                    }
                    move_uploaded_file($_FILES["image"]["tmp_name"], $review->image->getPath());
                } else if ($_POST["deleteImage"] === true) {
                    if ($review->image) {
                        $review->image->remove();
                        if (file_exists($review->image->getPath())) {
                            unlink($review->image->getPath());
                        }
                        $review->image = null;
                    }
                }
                $review->save();
                $this->redirect();
                break;
            case self::DELETE:
                if (!$this->verifyRights()) {
                    break;
                }
                if ($this->id === null) {
                    $this->redirect();
                    break;
                }
                $review = Review::getfromId($this->id);
                if ($review === null) {
                    $this->redirect();
                    break;
                }
                if ($review->image) {
                    $review->image->remove();
                    if (file_exists($review->image->getPath())) {
                        unlink($review->image->getPath());
                    }
                }
                $review->remove();
                $this->redirect();
                break;
            case self::LIST:
                if ($this->id === null) {
                    $this->id = 0;
                }
                if (isset($_POST["search"])) {
                    $reviews = Review::search($this->id, $_POST["search"]);
                } else {
                    $reviews = Review::listByDate($this->id);
                }
                $this->render(["search" => $_POST["search"] ?? "", "reviews" => $reviews]);
                break;
            default:
                self::redirect();
                break;
        }
    }
}