<?php

include_once "Models/Review.php";
include_once "Models/Booking.php";

final class Reviews extends Controller {
    final public const ADD = "add";
    final public const EDIT = "edit";
    final public const DELETE = "delete";
    final public const LIST = "list";

    public function route(): void {
        $action = strtolower($_GET["action"] ?? self::LIST);

        switch ($action) {
            case self::ADD:
                if (!$this->verifyRights($action)) {
                    break;
                }
//                if (count($this->user->getBookings()) <= count($this->user->getReviews())) {
//                    $this->render("Reviews", $action, ["error" => "You are only allowed 1 review per booking."]);
//                    break;
//                }
                if (!isset($_POST["title"]) || !isset($_POST["message"]) || !isset($_FILES["image"])) {
                    $this->render("Reviews", $action);
                    break;
                }
                if ($_POST["title"] === "" || $_POST["message"] === "") {
                    $this->render("Reviews", $action, [
                        "error" => "Title or Message cannot be empty",
                        "title" => $_POST["title"],
                        "message" => $_POST["message"],
                    ]);
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
                if (!$this->verifyRights($action)) {
                    break;
                }
                $review = Review::getfromId((int)$_GET["id"]);
                if (is_null($review)) {
                    $this->redirect();
                    break;
                }
                if (!isset($_POST["title"]) || !isset($_POST["message"])) {
                    $this->render("Reviews", $action, ["review" => $review]);
                    break;
                }
                if ($_POST["title"] === "" || $_POST["message"] === "") {
                    $this->render("Reviews", $action, [
                        "error" => "Title or Message cannot be empty",
                        "title" => $_POST["title"],
                        "message" => $_POST["message"],
                    ]);
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
                }
                $review->save();
                $this->redirect();
                break;
            case self::DELETE:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $review = Review::getfromId((int)$_GET["id"]);
                if (is_null($review)) {
                    $this->redirect();
                    break;
                }
                if (!isset($_POST["confirm"])) {
                    $this->render("Reviews", $action, ["review" => $review]);
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
            default:
                if (isset($_POST["search"])) {
                    $reviews = Review::search((int)($_GET["id"] ?? 0), $_POST["search"]);
                } else {
                    $reviews = Review::listByDate((int)($_GET["id"] ?? 0));
                }
                $this->render("Reviews", "list", [
                    "search" => $_POST["search"] ?? "",
                    "reviews" => $reviews,
                ]);
                break;
        }
    }
}