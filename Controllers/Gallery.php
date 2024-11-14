<?php

include_once "Controllers/Controller.php";
include_once "Models/Review.php";

class Gallery extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/gallery/" . $action);
    }

    public function route(): void {
        $action = isset($_GET['action']) ? strtolower($_GET['action']) : "";

        switch ($action) {
            case "add":
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_POST['title']) || !isset($_POST['message'])) {
                    $this->render("Gallery", $action, ["user" => $this->user]);
                    break;
                }
                Review::new($this->user->id, $_POST['title'], $_POST['message'], date("Y-m-d H:i:s"));
                $this->redirect();
                break;
            case "edit":
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_POST['title']) || !isset($_POST['message'])) {
                    $this->render("Gallery", $action, ["user" => $this->user]);
                    break;
                }
                $review = Review::getfromId((int)$_GET['id']);
                if (is_null($review)) {
                    $this->redirect();
                    break;
                }
                $review->title = $_POST['title'];
                $review->message = $_POST['message'];
                if (!$review->save()) {
                    $this->render("Gallery", $action, ["user" => $this->user, "error" => "Unable to update review. Try Again Later."]);
                    break;
                }
                $this->redirect();
                break;
            case "delete":
                if (!$this->verifyRights($action)) {
                    break;
                }
                $review = Review::getfromId((int)$_GET['id']);
                if (is_null($review)) {
                    $this->redirect();
                    break;
                }
                $review->delete();
                $this->redirect();
                break;
            default:
                $this->render("Gallery", "list", ["user" => $this->user, "reviews" => Review::list(10, (10 * (int)($_GET['id'] ?? 0)))]);
        }

    }
}