<?php

include_once "Models/User.php";
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
                    setcookie("token", $user->token);
                    $this->render("Account", "account", [$user]);
                } else {
                    $this->render("Account", "login");
                }
                break;
            case "register":
                if (isset($_POST['firstName']) &&
                    isset($_POST['lastName']) &&
                    isset($_POST['email']) &&
                    isset($_POST['password'])
                ) {
                    try {
                        if ($user = User::register($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['phoneNumber'] ?? null)) {
                            setcookie("token", $user->token);
                            $this->render("Account", "account", [$user]);
                        } else {
                            $this->render("Account", "login");
                        }
                    } catch (Exception) {
                        echo "Error Generating Token";  // TODO Improve this error handling (Maybe make an error page?)
                    }
                } else {
                    $this->render("Account", "register");
                }
                break;
            case "logout":
                if ($user = User::getFromCookie()) {
                    setcookie("token", "", time() - 3600);
                    $user->token = null;
                }
                $this->render("Account", "login");
                break;
            default:
                if ($user = User::getFromCookie()) {
                    $this->render("Account", "account", [$user]);
                } else {
                    $this->render("Account", "login");
                }
                break;
        }
    }
}
