<?php

use Random\RandomException;

include_once "Models/User.php";
include_once "Controllers/Controller.php";
include_once "Controllers/HomeController.php";

class AccountController extends Controller {
    public static function redirect(string $action = "personalInformation"): void {
        header('Location: ' . BASE_PATH . "/account/" . $action);
    }

    /**
     * @throws RandomException
     */
    private static function makeCookie(User $user): void {
        $token = hash("sha256", $user->id . "06BlK0dFkhC1LVf9" . bin2hex(random_bytes(16)));
        setcookie("token", $token);
        $user->setToken($token);
    }

    public function route(): void {
        $action = strtolower($_GET['action'] ?? "personalInformation");

        switch ($action) {
            case "login":
                if (isset($_POST['email']) && isset($_POST['password'])) {
                    if ($user = User::getFromEmailPassword($_POST['email'], $_POST['password'])) {
                        try {
                            self::makeCookie($user);
                            AccountController::redirect();
                        } catch (Exception) {
                            $this->render("Account", $action, [
                                "error" => "Error While Generating Token. Try Again Later",
                                "email" => $_POST['email']
                            ]);
                        }
                    } else {
                        $this->render("Account", $action, [
                            "error" => "Invalid Email or Password",
                            "email" => $_POST['email']
                        ]);
                    }
                } else {
                    $this->render("Account", $action);
                }
                break;
            case "register":
                if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirmPassword'])) {
                    if ($_POST['password'] != $_POST['confirmPassword']) {
                        $this->registerError("Passwords do not match");
                        break;
                    }
                    $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                        $this->registerError("Invalid Email format");  // TODO Improve this error message
                        break;
                    }
                    if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{6,}$/", $_POST['password'])) {
                        $this->registerError("Password must be 6 characters, One uppercase, One lowercase, One digit, One symbol");  // TODO Improve this error message
                        break;
                    }
                    if ($_POST['phoneNumber']) {
                        $_POST['phoneNumber'] = filter_var($_POST['phoneNumber'], FILTER_SANITIZE_NUMBER_INT);
                        if (!preg_match("/^(\(?\d{3}\)?)?[-.\s]?\d{3}[-.\s]?\d{4}$/", $_POST['phoneNumber'])) {
                            $this->registerError("Invalid Phone Number format");  // TODO Improve this error message
                            break;
                        }
                    }
                    if ($_POST['birthDate']) {
                        if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['birthDate'])) {
                            $this->registerError("Invalid Birth Date format");
                            break;
                        }
                    }

                    if ($user = User::new($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['phoneNumber'] ?? null, $_POST['birthDate'] ?? null)) {
                        try {
                            self::makeCookie($user);
                            AccountController::redirect();
                        } catch (Exception) {
                            $this->registerError("Error While Generating Token. Try Again Later");
                        }
                    } else {
                        $this->registerError("Email already in use");
                    }
                } else {
                    $this->render("Account", $action);
                }
                break;
            case "logout":
                setcookie("token", "", 1);  // Remove cookie "token" from the user's browser
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

    private function registerError($error): void {
        $this->render("Account", "register", [
                "error" => $error,
                "firstName" => $_POST['firstName'],
                "lastName" => $_POST['lastName'],
                "email" => $_POST['email'],
                "phoneNumber" => $_POST['phoneNumber'] ?? null,
                "birthDate" => $_POST['birthDate'] ?? null
            ]
        );
    }
}
