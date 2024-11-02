<?php

include_once "Controllers/Controller.php";

class AccountController extends Controller {
    function route(): void {
        $action = strtolower($_GET['action']) ?? "login";

        switch ($action) {
            case "login":
                if (isset($_POST['email']) &&
                    isset($_POST['password']) &&
                    $user = User::getFromEmailPassword($_POST['email'], $_POST['password'])
                ) {
                    $this->render("Account", "account", [$user]);
                } else {
                    $this->render("Account", "login");
                }
                break;
            case "register":
                if (isset($_POST['first_name']) &&
                    isset($_POST['last_name']) &&
                    isset($_POST['email']) &&
                    isset($_POST['password'])
                ) {
                    try {
                        if ($user = User::register($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['phoneNumber'] ?? null)) {
                            $this->render("Account", "account", [$user]);
                        } else {
                            $this->render("Account", "register");
                        }
                    } catch (Exception $e) {
                        // TODO Handle this error
                    }
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