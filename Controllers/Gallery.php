<?php

include_once "Models/Review.php";
include_once "Models/Booking.php";

final class Gallery extends Controller {
    private const INSTAGRAM_ACCESS_TOKEN = "IGQWROU1d1QVlBWWVzeVRrTkdVQWI4UWozRnRGcUZAKVFctMmRWcFRyT1FPek1oSWtOM2tHQ2ZAVNWxHdlFkalpaY3ZATUkx0SXZAXOERscGRqeW9ZAaWFfWVc0QlJONEJGZAzNxRmR6YTJJcjJlQm10SUp0NWZAZAb2xjYkEZD";

    public function route(): void {
        $action = isset($_GET["action"]) ? strtolower($_GET["action"]) : "";

        switch ($action) {
            case "add":
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (count($this->user->getBookings()) <= count($this->user->getReviews())) {
                    $this->render("Gallery", $action, [
                        "user" => $this->user,
                        "error" => "You are only allowed 1 review per booking.",
                    ]);
                    break;
                }
                if (!isset($_POST["title"]) || !isset($_POST["message"]) || !isset($_FILES["image"])) {
                    $this->render("Gallery", $action, ["user" => $this->user]);
                    break;
                }
                if ($_POST["title"] === "" || $_POST["message"] === "") {
                    $this->render("Gallery", $action, [
                        "user" => $this->user,
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
            case "edit":
                if (!$this->verifyRights($action)) {
                    break;
                }
                $review = Review::getfromId((int)$_GET["id"]);
                if (is_null($review)) {
                    $this->redirect();
                    break;
                }
                if (!isset($_POST["title"]) || !isset($_POST["message"])) {
                    $this->render("Gallery", $action, ["user" => $this->user, "review" => $review]);
                    break;
                }
                if ($_POST["title"] === "" || $_POST["message"] === "") {
                    $this->render("Gallery", $action, [
                        "user" => $this->user,
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
            case "delete":
                if (!$this->verifyRights($action)) {
                    break;
                }
                $review = Review::getfromId((int)$_GET["id"]);
                if (is_null($review)) {
                    $this->redirect();
                    break;
                }
                if (!isset($_POST["confirm"])) {
                    $this->render("Gallery", $action, ["user" => $this->user, "review" => $review]);
                    break;
                }
                if ($review->image) {
                    $review->image->delete();
                    if (file_exists($review->image->getPath())) {
                        unlink($review->image->getPath());
                    }
                }
                $review->delete();
                $this->redirect();
                break;
            default:
                $url = "https://graph.instagram.com/me/media?fields=id,caption,media_url,media_type&access_token=" . self::INSTAGRAM_ACCESS_TOKEN;
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec($ch);
                curl_close($ch);
                $data = json_decode($response, true);

                $this->render("Gallery", "list", [
                    "user" => $this->user,
                    "reviews" => Review::list(null, 10, (10 * (int)($_GET["id"] ?? 0))),
                    "mediaItems" => array_map(fn($item) => [
                        "url" => $item["media_url"],
                        "type" => $item["media_type"],
                        "caption" => $item["caption"] ?? ""
                    ], $data["data"] ?? []),
                ]);
                break;
        }
    }
}