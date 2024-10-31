<?php

include_once "Controllers/Controller.php";

class AccountController extends Controller {
    function route(): void {
        $action = strtolower($_GET['action']) ?? "login";

        switch ($action) {
            case "login":
                if (isset($_POST['email']) &&
                    isset($_POST['password']) &&
                    User::login($_POST)
                ) {
                    $this->render("Account", "account");
                } else {
                    $this->render("Account", "login");
                }
                break;
            case "register":
                if (isset($_POST['first_name']) &&
                    isset($_POST['last_name']) &&
                    isset($_POST['email']) &&
                    isset($_POST['password']) &&
                    $account = User::register($_POST)
                ) {
                    $this->render("Account", "account");
                } else {
                    $this->render("Account", "register");
                }
                break;
            default:
                try {
                    $this->render("Account", "account", User::getFromToken($_COOKIE['token']));
                } catch (Exception $e) {
                    $this->render("Account", "login");
                }
                break;
        }
    }
}