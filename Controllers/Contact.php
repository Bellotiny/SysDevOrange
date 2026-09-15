<?php

include_once "Controllers/Mail/Mail.php";

final class Contact extends Controller {
    final public const CONTACT = "contact";
    final public const CONFIRMATION = "confirmation";

    public function __construct(?string $action = null) {
        parent::__construct($action ?? self::CONTACT);
    }

    public function route(): void {
        switch ($this->action) {
            case self::CONTACT:
                if (!isset($_POST["firstName"]) || !isset($_POST["lastName"]) || !isset($_POST["email"]) || !isset($_POST["message"])) {
                    $this->render();
                    return;
                }
                $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->render(["error" => "Invalid Email format"]);
                    return;
                }
                self::redirect(self::CONFIRMATION);
                flush();
                Mail::send(
                    "Website Contact-Us Form",
                    $_POST["message"] . "\n\nFrom: " . $_POST["firstName"] . " " . $_POST["lastName"] . " <" . $_POST["email"] . ">",
                    "snooknail@gmail.com", "Snook's Nail Salon",
                    $_POST['email'], $_POST['firstName'] . " " . $_POST['lastName'],
                );
                break;
            case self::CONFIRMATION:
                $this->render();
                break;
            default:
                self::redirect();
                break;
        }
    }
}