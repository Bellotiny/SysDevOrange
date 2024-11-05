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
                    $this->render("Account", "login", ["error" => "Invalid Email or Password"]);
                }
                break;
            case "register":
                if (isset($_POST['firstName']) &&
                    isset($_POST['lastName']) &&
                    isset($_POST['email']) &&
                    isset($_POST['password'])&&
                    isset($_POST['confirmPassword'])
                ) {
                    if ($_POST['password'] != $_POST['confirmPassword']) {
                        $this->render("Account", "register", ["error" => "Passwords do not match"]);
                        break;
                    } 
                    try {
                        if ($user = User::register($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['phoneNumber'] ?? null, $_POST['birthDate'] ?? null)) {
                            setcookie("token", $user->token);
                            header('Location: ' . BASE_PATH . "/account");
                        } else {
                            $this->render("Account", "register", ["error" => "Email already in user"]);
                        }
                    } catch (Exception) {
                        echo "Error Generating Token";  // TODO Improve this error handling (Maybe make an error page?)
                    }
                } else {
                    $this->render("Account", "register", ["error" => "Missing Required Fields"]);
                }
                break;
            case "logout":
                if ($user = User::getFromCookie()) {
                    setcookie("token", "", time() - 3600);
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
