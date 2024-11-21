<?php

include_once "Mail/Mail.php";

final class Contact extends Controller {
    public function route(): void {
        if (isset($_GET['action']) && strtolower($_GET['action']) === "confirmation") {
            $this->render("Contact", "confirmation");
            return;
        }
        if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['email']) || !isset($_POST['message'])) {
            $this->render("Contact", "contact");
            return;
        }
        $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $this->render("Contact", "contact", ["error" => "Invalid Email format"]);
            return;
        }
        self::redirect("confirmation");
        flush();
        Mail::send(
            "Website Contact-Us Form",
            $_POST['message'] . "\n\nFrom: " . $_POST['firstName'] . " " . $_POST['lastName'] . " <" . $_POST['email'] . ">",
            "snooknail@gmail.com", "Snook's Nail Salon",
            $_POST['email'], $_POST['firstName'] . " " . $_POST['lastName'],
        );
    }
}