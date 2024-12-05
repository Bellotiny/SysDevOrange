<?php

include_once "Models/User.php";
include_once "Models/Service.php";
include_once "Models/Color.php";
include_once "Models/Booking.php";
include_once "Models/Availability.php";
include_once "Controllers/Home.php";
include_once "Controllers/Mail/Mail.php";

final class Account extends Controller {
    final public const REGISTER = "register";
    final public const EDIT = "edit";
    final public const LOGIN = "login";
    final public const TWO_FACTOR_AUTHENTICATION = "2fa";
    final public const FORGOT = "forgot";
    final public const RECOVERY = "recovery";
    final public const CHANGE_PASSWORD = "change-password";
    final public const LOGOUT = "logout";
    final public const DELETE = "delete";

    final public const PERSONAL_INFORMATION = "personalInformation";
    final public const HISTORY = "history";

    final public const SCHEDULE = "schedule";
    final public const AVAILABILITY_ADD = "addavailability";
    final public const AVAILABILITY_DELETE = "deleteavailability";
    final public const BOOKING_DELETE = "bookingdelete";
    final public const BOOKING_EDIT = "bookingedit";
    final public const BOOKING_VIEW = "viewbooking";
    final public const BOOKING_LIST = "bookinglist";

    final public const INVENTORY = "inventory";
    final public const COLOR_ADD = "addcolor";
    final public const COLOR_EDIT = "editcolor";
    final public const COLOR_DELETE = "deletecolor";
    final public const SERVICE_ADD = "addservice";
    final public const SERVICE_EDIT = "editservice";
    final public const SERVICE_DELETE = "deleteservice";
    final public const ADD_DISCOUNT = "adddiscount";
    final public const EDIT_DISCOUNT = "editdiscount";
    final public const DELETE_DISCOUNT = "deletediscount";

    public function route(): void {
        $action = strtolower($_GET["action"] ?? self::PERSONAL_INFORMATION);

        switch ($action) {
            case self::REGISTER:
                if (!isset($_POST["firstName"]) || !isset($_POST["lastName"]) || !isset($_POST["email"]) || !isset($_POST["password"]) || !isset($_POST["confirmPassword"])) {
                    $this->render("Account", $action);
                    break;
                }
                $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->formError($action, "Invalid Email format");  // TODO Improve this error message
                    break;
                }
                $user = User::getFromEmail($_POST["email"]);
                if ($user && $user->hasPassword()) {  // If a user doesn't have a password, let them "claim" this account with this email.
                    $this->formError($action, "Email already in use");
                    break;
                }
                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{6,}$/", $_POST["password"])) {
                    $this->formError($action, "The password must be at least 6 characters long and include at least one number, one symbol, one lowercase letter, and one uppercase letter");
                    break;
                }
                if ($_POST["password"] != $_POST["confirmPassword"]) {
                    $this->formError($action, "Passwords do not match");
                    break;
                }
                if ($_POST["phoneNumber"]) {
                    $_POST["phoneNumber"] = filter_var($_POST["phoneNumber"], FILTER_SANITIZE_NUMBER_INT);
                }
                if ($_POST["birthDate"]) {
                    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["birthDate"])) {
                        $this->formError($action, "Invalid Birth Date format");
                        break;
                    }
                }
                $user = User::new($_POST["firstName"], $_POST["lastName"], $_POST["email"], $_POST["password"], $_POST["phoneNumber"] ?? null, $_POST["birthDate"] ?? null);
                if ($user === null) {
                    $this->formError($action, "Email already in use");
                    break;
                }
                try {
                    $token = hash("sha256", $user->id . "06BlK0dFkhC1LVf9" . bin2hex(random_bytes(16)));
                    setcookie("token", $token, time() + 34560000, "/");
                    $user->setToken($token);
                    self::redirect();
                } catch (Exception) {
                    $this->formError($action, "Unable to generate token. Try Again Later");
                }
                break;
            case self::EDIT:
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_POST["firstName"]) || !isset($_POST["lastName"]) || !isset($_POST["email"]) || !isset($_POST["phoneNumber"]) || !isset($_POST["birthDate"])) {
                    $this->render("Account", $action);
                    break;
                }
                $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->formError($action, "Invalid Email format");
                    break;
                }
                if ($_POST["phoneNumber"]) {
                    $_POST["phoneNumber"] = filter_var($_POST["phoneNumber"], FILTER_SANITIZE_NUMBER_INT);
                } else {
                    $_POST["phoneNumber"] = null;
                }
                if ($_POST["birthDate"]) {
                    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["birthDate"])) {
                        $this->formError($action, "Invalid Birth Date format");
                        break;
                    }
                } else {
                    $_POST["birthDate"] = null;
                }
                $this->user->firstName = $_POST["firstName"];
                $this->user->lastName = $_POST["lastName"];
                $this->user->email = $_POST["email"];
                $this->user->phoneNumber = $_POST["phoneNumber"];
                $this->user->birthDate = $_POST["birthDate"];
                if (!$this->user->save()) {
                    $this->formError($action, "Email already in use");
                    break;
                }
                $this->render("Account", $action, ["message" => "Changes saved"]);
                break;
            case self::LOGIN:
                if (!isset($_POST["email"]) || !isset($_POST["password"])) {
                    $this->render("Account", $action);
                    break;
                }
                $user = User::getFromEmailPassword($_POST["email"], $_POST["password"]);
                if ($user === null) {
                    $this->render("Account", $action, ["error" => "Invalid Email or Password", "email" => $_POST["email"]]);
                    break;
                }
                try {
                    $code = random_int(1000, 9999);
                } catch (Exception) {
                    $this->render("Account", $action, ["error" => "Error While Generating 2FA Code. Try Again Later", "email" => $_POST["email"]]);
                }
                session_start();
                $_SESSION["user"] = $user;
                $_SESSION["time"] = time();
                $_SESSION["2fa"] = $code;
                $_SESSION["tries"] = 0;
                self::redirect(self::TWO_FACTOR_AUTHENTICATION);
                flush();
                session_write_close();
                Mail::send(
                    "2FA Code for Snook's Nail Nook",
                    "Your 2FA Code is: $code",
                    $user->email, "$user->firstName $user->lastName",
                    $user->email, "$user->firstName $user->lastName"
                );
                break;
            case self::TWO_FACTOR_AUTHENTICATION:

                session_start();
                var_dump($_SESSION["2fa"]);
                if (!isset($_POST["code"])) {
                    $this->render("Account", $action);
                    break;
                }
                session_start();
                if (!isset($_SESSION["user"]) || !isset($_SESSION["time"]) || !isset($_SESSION["2fa"]) || !isset($_SESSION["tries"])) {
                    self::redirect(self::LOGIN);
                    break;
                }
                if ($_SESSION["time"] + 300 <= time()) {  // Cannot take more than 5 minutes to enter the code
                    $this->render("Account", $action, ["error" => "Timer expired, login again to get a new code"]);
                    session_destroy();
                    break;
                }
                if ($_SESSION["2fa"] != $_POST["code"]) {
                    $_SESSION["tries"]++;
                    if ($_SESSION["tries"] > 3) {  // Cannot try more than 3 times to enter the code
                        $this->render("Account", $action, ["error" => "Too many tries, login again to get a new code"]);
                        session_destroy();
                    } else {
                        $this->render("Account", $action, ["error" => "Invalid Code"]);
                    }
                    break;
                }
                $token = $_SESSION["user"]->getToken();
                if ($token === null) {
                    try {
                        $token = hash("sha256", $_SESSION["user"]->id . "06BlK0dFkhC1LVf9" . bin2hex(random_bytes(16)));
                        $_SESSION["user"]->setToken($token);
                    } catch (Exception) {
                        $this->render("Account", $action, ["error" => "Error While Generating Token. Try Again Later", "email" => $_POST["email"]]);
                    }
                }
                setcookie("token", $token, time() + 34560000, "/");
                self::redirect();
                session_destroy();
                break;
            case self::FORGOT:
                if (!isset($_POST["email"])) {
                    $this->render("Account", $action);
                    break;
                }
                $user = User::getFromEmail($_POST["email"]);
                try {
                    $code = random_int(10000000, 99999999);
                } catch (Exception) {
                    $this->render("Account", $action, ["error" => "Error While Generating Recovery Code. Try Again Later"]);
                }
                session_start();
                if ($user !== null) $_SESSION["user"] = $user;
                $_SESSION["time"] = time();
                $_SESSION["recovery"] = $code;
                session_write_close();
                self::redirect(self::RECOVERY);
                flush();
                if ($user !== null) {
                    Mail::send(
                        "Recovery Code for Snook's Nail Nook",
                        "Your Recovery Code is: $code",
                        $user->email, "$user->firstName $user->lastName",
                        $user->email, "$user->firstName $user->lastName"
                    );
                }
                break;
            case self::RECOVERY:
                if (!isset($_POST["code"])) {
                    $this->render("Account", $action);
                    break;
                }
                session_start();
                if (!isset($_SESSION["user"]) || !isset($_SESSION["time"]) || !isset($_SESSION["recovery"])) {
                    self::redirect(self::FORGOT);
                    break;
                }
                if ($_SESSION["time"] + 300 <= time()) {  // Cannot take more than 5 minutes to enter the code
                    $this->render("Account", $action, ["error" => "Timer expired, login again to get a new code"]);
                    session_destroy();
                    break;
                }
                if ($_SESSION["recovery"] != $_POST["code"]) {
                    $this->render("Account", $action, ["error" => "Incorrect, go back to the forgot password page to get a new code"]);
                    session_destroy();
                    break;
                }
                $token = $_SESSION["user"]->getToken();
                if ($token === null) {
                    try {
                        $token = hash("sha256", $_SESSION["user"]->id . "06BlK0dFkhC1LVf9" . bin2hex(random_bytes(16)));
                        $_SESSION["user"]->setToken($token);
                    } catch (Exception) {
                        $this->render("Account", $action, ["error" => "Error While Generating Token. Try Again Later", "email" => $_POST["email"]]);
                    }
                }
                setcookie("token", $token, time() + 34560000, "/");
                var_dump($_SESSION);
                self::redirect(self::CHANGE_PASSWORD);
                session_destroy();
                break;
            case self::CHANGE_PASSWORD:
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_POST["password"]) || !isset($_POST["confirmPassword"])) {
                    $this->render("Account", $action);
                    break;
                }
                if ($_POST["password"] != $_POST["confirmPassword"]) {
                    $this->render("Account", $action, ["passwordError" => "Passwords do not match"]);
                    break;
                }
                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{6,}$/", $_POST["password"])) {
                    $this->render("Account", $action, ["passwordError" => "Password must be at least 6 characters long and include at least one number, one symbol, one lowercase letter, and one uppercase letter"]);
                    break;
                }
                if (!$this->user->updatePassword($_POST["password"])) {
                    $this->render("Account", $action, ["passwordError" => "Failed to update password"]);
                    break;
                }
                $this->render("Account", $action, ["passwordMessage" => "Password saved"]);
                break;
            case self::LOGOUT:
                if ($this->user !== null) {
                    setcookie("token", "", -1, "/");  // Remove cookie "token" from the user"s browser
                    $this->user->setToken(null);
                }
                Home::redirect();
                break;
            case self::DELETE:
                if ($this->user !== null) {
                    if (!isset($_POST["confirm"])) {
                        $this->render("Account", $action);
                        break;
                    }
                    $this->user->remove();
                    setcookie("token", "", -1, "/");  // Remove cookie "token" from the user"s browser
                }
                Home::redirect();
                break;

            case self::SCHEDULE:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $this->render("Account", $action, ["availabilities" => Availability::listFuture()]);
                break;
            case self::HISTORY:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $this->render("Account", $action, ["availabilities" => $this->user->getAvailabilities()]);
                break;
            case self::AVAILABILITY_ADD:
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_POST["start"]) || !isset($_POST["end"])) {
                    $this->render("Account", $action);
                    break;
                }
                // TODO Sanitize dates
                $_POST["start"] = strtotime($_POST["start"]);
                $_POST["end"] = strtotime($_POST["end"]);
                if (!$_POST["start"] || !$_POST["end"]) {
                    $this->render("Account", $action, ["error" => "Dates are wrong format"]);
                    break;
                }
                if ($_POST["start"] > $_POST["end"]) {
                    $this->render("Account", $action, ["error" => "End time must be before Start"]);
                    break;
                }
                $availabilities = Availability::newMany($_POST["start"], $_POST["end"]);
                if ($availabilities === null) {
                    $this->render("Account", $action, ["error" => "Error while creating new availability"]);
                    break;
                }
                $this->redirect(self::SCHEDULE);
                break;
            case self::AVAILABILITY_DELETE:
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_GET["id"])) {
                    $this->redirect(self::SCHEDULE);
                    break;
                }
                $times = explode("-", $_GET["id"]);
                $availabilities = Availability::getBetween((int)$times[0], (int)$times[1]);
                foreach ($availabilities as $availability) {
                    if ($availability->booking !== null) {
                        continue;
                    }
                    $availability->remove();
                }
                $this->redirect(self::SCHEDULE);
                break;
            case self::BOOKING_VIEW:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $booking = Booking::getFromId((int)$_GET["id"]);
                if (is_null($booking)) {
                    $this->redirect(self::SCHEDULE);
                    break;
                }
                $this->render("Account", $action, ["booking" => $booking]);
                break;
            case self::BOOKING_LIST:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $this->render("Account", $action, ["availabilities" => Availability::listWithBookings((int)($_GET["id"] ?? 0))]);
                break;
            case self::BOOKING_DELETE:
                if ($this->user === null) {
                    Account::redirect(Account::LOGIN);
                    break;
                }
                $booking = Booking::getFromId((int)$_GET["id"]);
                if (is_null($booking)) {
                    self::redirect(self::BOOKING_LIST, $_GET["id"]);
                    break;
                }
                if (!$this->user->hasRights("Account", $action) && $booking->user->id !== $this->user->id) {
                    $this::back();
                    break;
                }
                $booking->remove();
                self::redirect();
                break;

            case self::INVENTORY:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $this->render("Account", $action, [
                    "services" => Service::list(),
                    "colors" => Color::list(),
                    "discounts" => Discount::list()
                ]);
                break;
            case self::COLOR_ADD:
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["code"])) {
                    $this->render("Account", $action);
                    break;
                }
                $color = Color::new(
                    $_POST["name"],
                    $_POST["code"],
                    filter_var($_POST["visibility"] ?? false, FILTER_VALIDATE_BOOLEAN),
                );
                if ($color === null) {
                    $this->render("Account", $action, ["error" => "Error while creating new color"]);
                    break;
                }
                $this->redirect(self::INVENTORY);
                break;
            case self::SERVICE_ADD:
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["description"]) || !isset($_POST["type"]) || !isset($_POST["price"]) || !isset($_POST["duration"])) {
                    $this->render("Account", $action);
                    break;
                }
                $service = Service::new(
                    $_POST["name"],
                    $_POST["description"],
                    $_POST["type"],
                    filter_var($_POST["price"], FILTER_VALIDATE_FLOAT),
                    filter_var($_POST["duration"], FILTER_VALIDATE_INT),
                    filter_var($_POST["visibility"] ?? false, FILTER_VALIDATE_BOOLEAN),
                );
                if ($service === null) {
                    $this->render("Account", $action, ["error" => "Error while creating new color"]);
                    break;
                }
                $this->redirect(self::INVENTORY);
                break;
            case self::ADD_DISCOUNT:
                if (!$this->verifyRights($action)) {
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["type"]) ||
                    !isset($_POST["start"]) || !isset($_POST["end"]) ||
                    !isset($_POST["percent"]) || !isset($_POST["amount"])) {
                    $this->render("Account", $action);
                    break;
                }


                $discount = Discount::new(
                    $_POST["name"],
                    $_POST["type"],
                    $_POST["start"],
                    $_POST["end"],
                    filter_var($_POST["percent"], FILTER_VALIDATE_INT),
                    filter_var($_POST["amount"], FILTER_VALIDATE_FLOAT),
                );
                if ($discount === null) {
                    $this->render("Account", $action, ["error" => "Error while creating new color"]);
                    break;
                }
                $this->redirect(self::INVENTORY);
                break;
            case self::COLOR_EDIT:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $color = Color::getFromId((int)$_GET["id"]);
                if (is_null($color)) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["code"])) {
                    $this->render("Account", $action, ["color" => $color]);
                    break;
                }
                $color->name = $_POST["name"];
                $color->code = $_POST["code"];
                $color->visibility = filter_var($_POST["visibility"] ?? false, FILTER_VALIDATE_BOOLEAN);
                $color->save();
                $this->redirect(self::INVENTORY);
                break;
            case self::SERVICE_EDIT:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $service = Service::getFromId((int)$_GET["id"]);
                if (is_null($service)) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["description"]) || !isset($_POST["type"]) || !isset($_POST["price"]) || !isset($_POST["duration"])) {
                    $this->render("Account", $action, ["service" => $service]);
                    break;
                }
                $service->name = $_POST["name"];
                $service->description = $_POST["description"];
                $service->type = $_POST["type"];
                $service->price = filter_var($_POST["price"], FILTER_VALIDATE_FLOAT);
                $service->duration = filter_var($_POST["duration"], FILTER_VALIDATE_INT);
                $service->visibility = filter_var($_POST["visibility"] ?? false, FILTER_VALIDATE_BOOLEAN);
                $service->save();
                $this->redirect(self::INVENTORY);
                break;
            case self::EDIT_DISCOUNT:
                //var_dump($_GET, $_POST);
                if (!$this->verifyRights($action)) {
                    break;
                }
                $discount = Discount::getFromId((int)$_GET["id"]);
                //var_dump($discount);
                if (is_null($discount)) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                //var_dump(isset($_POST["name"]) );
                if (!isset($_POST["name"]) || !isset($_POST["type"]) ||
                    !isset($_POST["start"]) || !isset($_POST["end"]) ||
                    !isset($_POST["percent"]) || !isset($_POST["amount"])) {
                    $this->render("Account", $action, ["discount" => $discount]);
                    break;
                }
                $discount->name = $_POST["name"];
                $discount->type = $_POST["type"];
                $discount->start = $_POST["start"];
                $discount->end = $_POST["end"];
                $discount->percent = $_POST["percent"];
                $discount->amount = $_POST["amount"];
                $discount->save();
                $this->redirect(self::INVENTORY);

                break;
            case self::COLOR_DELETE:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $color = Color::getfromId((int)$_GET["id"]);
                if (is_null($color)) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $color->remove();
                $this->redirect(self::INVENTORY);
                break;
            case self::SERVICE_DELETE:
                if (!$this->verifyRights($action)) {
                    break;
                }
                $service = Service::getfromId((int)$_GET["id"]);
                if (is_null($service)) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $service->remove();
                $this->redirect(self::INVENTORY);
                break;

            default:
                if ($this->verifyRights($action)) {
                    $this->render("Account", $action);
                }
                break;
        }
    }

    private function formError($action, $error): void {
        $this->render("Account", $action, [
                "error" => $error,
                "firstName" => $_POST["firstName"],
                "lastName" => $_POST["lastName"],
                "email" => $_POST["email"],
                "phoneNumber" => $_POST["phoneNumber"],
                "birthDate" => $_POST["birthDate"],
            ]
        );
    }
}
