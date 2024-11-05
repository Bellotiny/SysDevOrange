<?php

use Random\RandomException;

include_once "Models/User.php";
include_once "Controllers/Controller.php";
include_once "Controllers/HomeController.php";

class AccountController extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/account/" . $action);
    }

    /**
     * @throws RandomException
     */
    private static function makeCookie(User $user): void {
        $user->token = hash("sha256", $user->id . "06BlK0dFkhC1LVf9" . bin2hex(random_bytes(16)));
        setcookie("token", $user->token);
        $user->save();
    }

    public function route(): void {
        $action = strtolower($_GET['action'] ?? "personalInformation");

        switch ($action) {
            case "login":
                if (isset($_POST['email']) &&
                    isset($_POST['password'])
                ) {
                    if ($user = User::getFromEmailPassword($_POST['email'], $_POST['password'])) {
                        try {
                            self::makeCookie($user);
                            AccountController::redirect();
                        } catch (Exception) {
                            $this->render("Account", "register", ["error" => "Error Generating Token"]);
                        }
                    } else {
                        $this->render("Account", "login", ["error" => "Invalid Email or Password"]);
                    }
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
                    $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $this->render("Account", "register", ["error" => "Invalid Email format"]);  // TODO Improve this error message
                        break;
                    }
                    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{6,}$/", $_POST['password'])) {
                        $this->render("Account", "register", ["error" => "Password must be 6 characters, One uppercase, One lowercase, One digit, One symbol"]);  // TODO Improve this error message
                        break;
                    }
                    if (isset($_POST['phoneNumber'])) {
                        $_POST['phoneNumber'] = filter_var($_POST['phoneNumber'], FILTER_SANITIZE_NUMBER_INT);
                        if (!preg_match("/^(\(?\d{3}\)?)?[-.\s]?\d{3}[-.\s]?\d{4}$/", $_POST['phoneNumber'])) {
                            $this->render("Account", "register", ["error" => "Invalid Phone Number format"]);  // TODO Improve this error message
                            break;
                        }
                    }

                    $_POST['firstName'] = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
                    $_POST['lastName'] = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);

                    if ($user = User::register($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['phoneNumber'] ?? null, $_POST['birthDate'] ?? null)) {
                        try {
                            self::makeCookie($user);
                            AccountController::redirect();
                        } catch (Exception) {
                            $this->render("Account", "register", ["error" => "Error Generating Token"]);
                        }
                    } else {
                        $this->render("Account", "register", ["error" => "Email already in use"]);
                    }
                } else {
                    $this->render("Account", "register");
                }
                break;
            case "logout":
                if (User::getFromCookie()) {
                    setcookie("token", "", time() - 3600);//setCookie is set to " ",expiration time of 1hr
                }
                HomeController::redirect();
                break;
            default:
                if ($user = User::getFromCookie()) {
                    if ($user->verifyRights("account", $action)) {
                        $this->render("Account", $action, [$user]);
                    } else {
                        $this->back();
                    }
                } else {
                    $this->render("Account", "login");
                }
                break;
        }
    }
}
