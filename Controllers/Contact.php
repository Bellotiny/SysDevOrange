<?php

include_once "Controllers/Controller.php";

class GalleryController extends Controller {
    private const INSTAGRAM_ACCESS_TOKEN = 'IGQWROU1d1QVlBWWVzeVRrTkdVQWI4UWozRnRGcUZAKVFctMmRWcFRyT1FPek1oSWtOM2tHQ2ZAVNWxHdlFkalpaY3ZATUkx0SXZAXOERscGRqeW9ZAaWFfWVc0QlJONEJGZAzNxRmR6YTJJcjJlQm10SUp0NWZAZAb2xjYkEZD';

    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/contact/" . $action);
    }

    public function route(): void {
        if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['email']) || !isset($_POST['message'])) {
            $this->render("Contact", "contact");
            return;
        }
        $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->render("Contact", "contact", ["error" => "Invalid Email format"]);
            return;
        }
        mail(  // TODO This doesnt seem to work on localhost, maybe it will work on a live server but if not we need to find another solution.
            "maxime.mirorefice@gmail.com",
            "Website Contact Form",
            "FROM: {$_POST['firstName']} {$_POST['lastName']}\n\nMESSAGE: {$_POST['message']}",
            array(
                "From" => $_POST['email'],
                "Reply-To" => $_POST['email'],
                "Content-Type" => 'text/html; charset=UTF-8',
                "X-Mailer" => 'PHP/' . phpversion(),
            ),
        );
        $this->render("Contact", "confirmation");
    }
}