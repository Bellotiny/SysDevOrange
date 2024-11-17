<?php

use Random\RandomException;

include_once "Models/User.php";
include_once "Controllers/Controller.php";
include_once "Controllers/Home.php";
include_once "Controllers/Mail/Mailer.php";

class Account extends Controller {
    public static function redirect(string $action = "personalInformation"): void {
        header('Location: ' . BASE_PATH . "/account/" . $action);
    }

    /**
     * @throws RandomException
     */
    private static function makeCookie(User $user): void {
        $token = hash("sha256", $user->id . "06BlK0dFkhC1LVf9" . bin2hex(random_bytes(16)));
        setcookie("token", $token, time() + 34560000, "/");
        $user->setToken($token);
    }

    public function route(): void {
        $action = strtolower($_GET['action'] ?? "personalInformation");

        switch ($action) {
            case "login":
                if (!isset($_POST['email']) || !isset($_POST['password'])) {
                    $this->render("Account", $action);
                    break;
                }
                $user = User::getFromEmailPassword($_POST['email'], $_POST['password']);
                if (is_null($user)) {
                    $this->render("Account", $action, ["error" => "Invalid Email or Password", "email" => $_POST['email']]);
                    break;
                }
                try {
                    $code = random_int(100000, 999999);
                } catch (Exception) {
                    $this->render("Account", $action, ["error" => "Error While Generating 2FA Code. Try Again Later", "email" => $_POST['email']]);
                }
                session_start();
                $_SESSION["user"] = $user;
                $_SESSION["code"] = $code;
                $_SESSION["time"] = time();
                $_SESSION["tries"] = 0;
                self::redirect("2fa");
                flush();
                Mailer::send(
                    "2FA Code for Snook's Nail Nook",
                    "Your 2FA Code is: $code",
                    $user->email, "$user->firstName $user->lastName",
                    $user->email, "$user->firstName $user->lastName"
                );
                break;
            case "2fa":
                if (!isset($_POST["code"])) {
                    $this->render("Account", $action);
                    break;
                }
                session_start();
                if (!isset($_SESSION["user"]) && !isset($_SESSION["code"]) && !isset($_SESSION["time"]) && !isset($_SESSION["tries"])) {
                    self::redirect("login");
                    break;
                }
                if ($_SESSION["time"] + 300 <= time()) {  // Cannot take more than 5 minutes to enter the code
                    $this->render("Account", $action, ["error" => "Timer expired, login again to get a new code"]);
                    session_destroy();
                    break;
                }
                if ($_SESSION["code"] != $_POST["code"]) {
                    $_SESSION["tries"]++;
                    if ($_SESSION["tries"] > 3) {  // Cannot try more than 3 times to enter the code
                        $this->render("Account", $action, ["error" => "Too many tries, login again to get a new code"]);
                        session_destroy();
                    } else {
                        $this->render("Account", $action, ["error" => "Invalid Code"]);
                    }
                    break;
                }
                try {
                    self::makeCookie($_SESSION["user"]);
                    self::redirect();
                } catch (Exception) {
                    $this->render("Account", $action, ["error" => "Error While Generating Token. Try Again Later", "email" => $_POST['email']]);
                }
                session_destroy();
                break;
            case "register":
                if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['confirmPassword'])) {
                    $this->render("Account", $action);
                    break;
                }
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
                $user = User::new($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['phoneNumber'] ?? null, $_POST['birthDate'] ?? null);
                if (is_null($user)) {
                    $this->registerError("Email already in use");
                    break;
                }
                try {
                    self::makeCookie($user);
                    self::redirect();
                } catch (Exception) {
                    $this->registerError("Unable to generate token. Try Again Later");
                }
                break;
            case "logout":
                setcookie("token", "", -1, "/");  // Remove cookie "token" from the user's browser
                Home::redirect();
                break;
            // Wrote this to render forgot.php for forgetting password
            case "forgot":
                $this->render("Account", $action);
                break;
            default:
                if ($this->verifyRights($action)) {
                    $this->render("Account", $action, [$this->user]);
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
