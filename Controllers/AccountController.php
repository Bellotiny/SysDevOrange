<?php

include_once "Models/User.php";
include_once "Controllers/Controller.php";

class AccountController extends Controller {
    function route(): void {
        $action = strtolower($_GET['action'] ?? "accountPersonalInformation");

        switch ($action) {
            case "login":
                if (isset($_POST['email']) &&
                    isset($_POST['password']) &&
                    $user = User::getFromEmailPassword($_POST['email'], $_POST['password'])
                ) {
                    setcookie("token", $user->token);
                    header('Location: ' . BASE_PATH . "/account");
                } else {
                    // TODO Add error message
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
                        if ($user = User::register($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['phoneNumber'] ?? null, $_POST['birthDate'] ?? null)) {
                            setcookie("token", $user->token);
                            header('Location: ' . BASE_PATH . "/account");
                        } else {
                            // TODO Add error message
                            $this->render("Account", "login");
                        }
                    } catch (Exception) {
                        echo "Error Generating Token";  // TODO Improve this error handling (Maybe make an error page?)
                    }
                } else {
                    // TODO Add error message
                    $this->render("Account", "register");
                }
                break;
            case "logout":
                if ($user = User::getFromCookie()) {
                    setcookie("token", "", time() - 3600);
                    $user->token = null;
                    $user->save();
                }
                header('Location: ' . BASE_PATH);
                break;
            default:
                if ($user = User::getFromCookie()) {
                    $this->render("Account", $action, [$user]);
                } else {
                    $this->render("Account", "login");
                }
                break;
        }
    }
}
