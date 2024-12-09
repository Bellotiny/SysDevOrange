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
    final public const REGISTER_CONFIRMATION = "register-confirmation";
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

    public function __construct(?string $action = null) {
        parent::__construct($action ?? self::PERSONAL_INFORMATION);
    }

    public function route(): void {
        switch ($this->action) {
            case self::REGISTER:
                if (!isset($_POST["firstName"]) || !isset($_POST["lastName"]) || !isset($_POST["email"]) ||
                    !isset($_POST["password"]) || !isset($_POST["confirmPassword"])) {
                    $this->render();
                    break;
                }
                $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->formError("Invalid Email format");
                    break;
                }
                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{6,}$/", $_POST["password"])) {
                    $this->formError("The password must be at least 6 characters long and include at least one number, one symbol, one lowercase letter, and one uppercase letter");
                    break;
                }
                if ($_POST["password"] != $_POST["confirmPassword"]) {
                    $this->formError("Passwords do not match");
                    break;
                }
                if ($_POST["phoneNumber"]) {
                    $_POST["phoneNumber"] = filter_var($_POST["phoneNumber"], FILTER_SANITIZE_NUMBER_INT);
                }
                if ($_POST["birthDate"]) {
                    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["birthDate"])) {
                        $this->formError("Invalid Birth Date format");
                        break;
                    }
                }
                $user = User::getFromEmail($_POST["email"]);
                if ($user !== null && $user->hasPassword()) {
                    $this->render(["error" => "Email already in use"]);
                    break;
                }
                try {
                    $code = random_int(100000, 999999);
                } catch (Exception) {
                    $this->render(["error" => "Error While Generating 2FA Code. Try Again Later", "email" => $_POST["email"]]);
                }
                session_start();
                $_SESSION["time"] = time();
                $_SESSION["2fa"] = $code;
                $_SESSION["tries"] = 0;
                $_SESSION["firstName"] = $_POST["firstName"];
                $_SESSION["lastName"] = $_POST["lastName"];
                $_SESSION["email"] = $_POST["email"];
                $_SESSION["password"] = $_POST["password"];
                $_SESSION["phoneNumber"] = $_POST["phoneNumber"] ?? null;
                $_SESSION["birthDate"] = $_POST["birthDate"] ?? null;
                self::redirect(self::REGISTER_CONFIRMATION);
                flush();
                session_write_close();
                Mail::send(
                    "Registration Code for Snook's Nail Nook",
                    "Your Registration Confirmation Code is: $code",
                    $_POST["email"], $_POST["firstName"] . " " . $_POST["lastName"],
                    $_POST["email"], $_POST["firstName"] . " " . $_POST["lastName"]
                );
                break;
            case self::REGISTER_CONFIRMATION:
                if (!isset($_POST["code"])) {
                    $this->render();
                    break;
                }
                session_start();
                if (!isset($_SESSION["time"]) || !isset($_SESSION["2fa"]) || !isset($_SESSION["tries"]) ||
                    !isset($_SESSION["firstName"]) || !isset($_SESSION["lastName"]) ||
                    !isset($_SESSION["email"]) || !isset($_SESSION["password"])) {
                    self::redirect(self::LOGIN);
                    break;
                }
                if ($_SESSION["time"] + 300 <= time()) {  // Cannot take more than 5 minutes to enter the code
                    $this->render(["error" => "Timer expired, login again to get a new code"]);
                    session_destroy();
                    break;
                }
                if ($_SESSION["2fa"] != $_POST["code"]) {
                    $_SESSION["tries"]++;
                    if ($_SESSION["tries"] > 3) {  // Cannot try more than 3 times to enter the code
                        $this->render(["error" => "Too many tries, login again to get a new code"]);
                        session_destroy();
                    } else {
                        $this->render(["error" => "Invalid Code"]);
                    }
                    break;
                }
                $user = User::getFromEmail($_SESSION["email"]);
                if ($user === null) {
                    $user = User::new(
                        $_SESSION["firstName"],
                        $_SESSION["lastName"],
                        $_SESSION["email"],
                        $_SESSION["password"],
                        $_SESSION["phoneNumber"] ?? null,
                        $_SESSION["birthDate"] ?? null
                    );
                    if ($user === null) {
                        $this->render(["error" => "Error creating user"]);
                        break;
                    }
                } else {
                    // If a user already exists but doesn't have a password, let them "claim" this account with this email.
                    $user->firstName = $_SESSION["firstName"];
                    $user->lastName = $_SESSION["lastName"];
                    $user->phoneNumber = $_SESSION["phoneNumber"] ?? null;
                    $user->birthDate = $_SESSION["birthDate"] ?? null;
                    $user->updatePassword($_SESSION["password"]);
                    $user->save();
                }
                try {
                    $user->generateToken();
                } catch (Exception) {
                    $this->render(["error" => "Error While Generating Token. Try Again Later"]);
                    break;
                }
                self::redirect();
                session_destroy();
                break;
            case self::EDIT:
                if (!$this->ensureRights()) {
                    break;
                }
                if (!isset($_POST["firstName"]) || !isset($_POST["lastName"]) || !isset($_POST["email"]) ||
                    !isset($_POST["phoneNumber"]) || !isset($_POST["birthDate"])) {
                    $this->render();
                    break;
                }
                $_POST["email"] = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
                if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                    $this->formError("Invalid Email format");
                    break;
                }
                if ($_POST["phoneNumber"]) {
                    $_POST["phoneNumber"] = filter_var($_POST["phoneNumber"], FILTER_SANITIZE_NUMBER_INT);
                } else {
                    $_POST["phoneNumber"] = null;
                }
                if ($_POST["birthDate"]) {
                    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["birthDate"])) {
                        $this->formError("Invalid Birth Date format");
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
                try {
                    $this->user->save();
                } catch (Exception) {
                    $this->formError("Email already in use");
                    break;
                }
                $this->render(["message" => "Changes saved"]);
                break;
            case self::LOGIN:
                if (!isset($_POST["email"]) || !isset($_POST["password"])) {
                    $this->render();
                    break;
                }
                $user = User::getFromEmailPassword($_POST["email"], $_POST["password"]);
                if ($user === null) {
                    $this->render(["error" => "Invalid Email or Password", "email" => $_POST["email"]]);
                    break;
                }
                try {
                    $code = random_int(1000, 9999);
                } catch (Exception) {
                    $this->render(["error" => "Error While Generating 2FA Code. Try Again Later", "email" => $_POST["email"]]);
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
//                session_start();
//                var_dump($_SESSION["2fa"]);
                if (!isset($_POST["code"])) {
                    $this->render();
                    break;
                }
                session_start();
                if (!isset($_SESSION["user"]) || !isset($_SESSION["time"]) || !isset($_SESSION["2fa"]) || !isset($_SESSION["tries"])) {
                    self::redirect(self::LOGIN);
                    break;
                }
                if ($_SESSION["time"] + 300 <= time()) {  // Cannot take more than 5 minutes to enter the code
                    $this->render(["error" => "Timer expired, login again to get a new code"]);
                    session_destroy();
                    break;
                }
                if ($_SESSION["2fa"] != $_POST["code"]) {
                    $_SESSION["tries"]++;
                    if ($_SESSION["tries"] > 3) {  // Cannot try more than 3 times to enter the code
                        $this->render(["error" => "Too many tries, login again to get a new code"]);
                        session_destroy();
                    } else {
                        $this->render(["error" => "Invalid Code"]);
                    }
                    break;
                }
                try {
                    $_SESSION["user"]->generateToken();
                } catch (Exception) {
                    $this->render(["error" => "Error While Generating Token. Try Again Later"]);
                    break;
                }
                self::redirect();
                session_destroy();
                break;
            case self::FORGOT:
                if (!isset($_POST["email"])) {
                    $this->render();
                    break;
                }
                $user = User::getFromEmail($_POST["email"]);
                try {
                    $code = random_int(10000000, 99999999);
                } catch (Exception) {
                    $this->render(["error" => "Error While Generating Recovery Code. Try Again Later"]);
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
                    $this->render();
                    break;
                }
                session_start();
                if (!isset($_SESSION["user"]) || !isset($_SESSION["time"]) || !isset($_SESSION["recovery"])) {
                    self::redirect(self::FORGOT);
                    break;
                }
                if ($_SESSION["time"] + 300 <= time()) {  // Cannot take more than 5 minutes to enter the code
                    $this->render(["error" => "Timer expired, login again to get a new code"]);
                    session_destroy();
                    break;
                }
                if ($_SESSION["recovery"] != $_POST["code"]) {
                    $this->render(["error" => "Incorrect, go back to the forgot password page to get a new code"]);
                    session_destroy();
                    break;
                }
                try {
                    $_SESSION["user"]->generateToken();
                } catch (Exception) {
                    $this->render(["error" => "Error While Generating Token. Try Again Later"]);
                    break;
                }
                session_destroy();
                self::redirect(self::CHANGE_PASSWORD);
                break;
            case self::CHANGE_PASSWORD:
                if (!$this->ensureRights()) {
                    break;
                }
                if (!isset($_POST["password"]) || !isset($_POST["confirmPassword"])) {
                    $this->render();
                    break;
                }
                if ($_POST["password"] != $_POST["confirmPassword"]) {
                    $this->render(["passwordError" => "Passwords do not match"]);
                    break;
                }
                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{6,}$/", $_POST["password"])) {
                    $this->render(["passwordError" => "Password must be at least 6 characters long and include at least one number, one symbol, one lowercase letter, and one uppercase letter"]);
                    break;
                }
                if (!$this->user->updatePassword($_POST["password"])) {
                    $this->render(["passwordError" => "Failed to update password"]);
                    break;
                }
                $this->render(["passwordMessage" => "Password saved"]);
                break;
            case self::LOGOUT:
                if ($this->user === null) {
                    Home::redirect();
                    break;
                }
                $token = Token::getFromCookie();
                if ($token === null) {
                    Home::redirect();
                    break;
                }
                $token->remove();
                Home::redirect();
                break;
            case self::DELETE:
                if ($this->user !== null) {
                    if (!isset($_POST["confirm"])) {
                        $this->render();
                        break;
                    }
                    $this->user->remove();
                    setcookie("token", "", -1, "/");  // Remove cookie "token" from the user"s browser
                }
                Home::redirect();
                break;

            case self::SCHEDULE:
                if (!$this->ensureRights()) {
                    break;
                }
                $this->render(["availabilities" => Availability::listFuture()]);
                break;
            case self::HISTORY:
                if (!$this->ensureRights()) {
                    break;
                }
                $this->render(["availabilities" => $this->user->getAvailabilities()]);
                break;
            case self::AVAILABILITY_ADD:
                if (!$this->ensureRights()) {
                    break;
                }
                if (!isset($_POST["start"]) || !isset($_POST["end"])) {
                    $this->render();
                    break;
                }
                $start = strtotime($_POST["start"]);
                $end = strtotime($_POST["end"]);
                if (!$start || !$end) {
                    $this->render(["error" => "Dates are wrong format"]);
                    break;
                }
                if ($start > $end) {
                    $this->render(["error" => "End time must be before Start"]);
                    break;
                }
                $start = $start - ($start % (30 * 60));
                $end = $end - ($end % (30 * 60));
                Availability::newMany($start, $end);
                $this->redirect(self::SCHEDULE);
                break;
            case self::AVAILABILITY_DELETE:
                if (!$this->ensureRights()) {
                    break;
                }
                if (!isset($_GET["start"]) || !isset($_GET["end"])) {
                    $this->redirect(self::SCHEDULE);
                    break;
                }
                Availability::deleteAvailableBetween((int)($_GET["start"]), (int)($_GET["end"]));
                $this->redirect(self::SCHEDULE);
                break;
            case self::BOOKING_VIEW:
                if (!$this->ensureRights()) {
                    break;
                }
                if ($this->id === null) {
                    $this::back(self::SCHEDULE);
                    break;
                }
                $booking = Booking::getFromId($this->id);
                if ($booking === null) {
                    $this->back(self::SCHEDULE);
                    break;
                }
                $this->render(["booking" => $booking]);
                break;
            case self::BOOKING_LIST:
                if (!$this->ensureRights()) {
                    break;
                }
                $this->render(["availabilities" => Availability::listUnavailable($this->id ?? 0)]);
                break;
            case self::BOOKING_DELETE:
                if (!$this->ensureAuthenticated()) {
                    break;
                }
                if ($this->id === null) {
                    $this::back(self::SCHEDULE);
                    break;
                }
                $booking = Booking::getFromId($this->id);
                if ($booking === null) {
                    self::back(self::SCHEDULE);
                    break;
                }
                if (!$this->verifyRights() && $this->user->id !== $booking->user->id) {  // If the user is not an admin and the booking does not belong to the user
                    $this::back(self::HISTORY);
                    break;
                }
                $booking->remove();
                self::redirect();
                break;

            case self::INVENTORY:
                if (!$this->ensureRights()) {
                    break;
                }
                $this->render([
                    "services" => Service::list(),
                    "colors" => Color::list(),
                    "discounts" => Discount::list()
                ]);
                break;
            case self::COLOR_ADD:
                if (!$this->ensureRights()) {
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["code"])) {
                    $this->render();
                    break;
                }
                $color = Color::new(
                    $_POST["name"],
                    $_POST["code"],
                    filter_var($_POST["visibility"] ?? false, FILTER_VALIDATE_BOOLEAN),
                );
                if ($color === null) {
                    $this->render(["error" => "Error while creating new color"]);
                    break;
                }
                $this->redirect(self::INVENTORY);
                break;
            case self::SERVICE_ADD:
                if (!$this->ensureRights()) {
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["description"]) || !isset($_POST["type"]) ||
                    !isset($_POST["price"]) || !isset($_POST["duration"])) {
                    $this->render();
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
                    $this->render(["error" => "Error while creating new service"]);
                    break;
                }
                $this->redirect(self::INVENTORY);
                break;
            case self::ADD_DISCOUNT:
                if (!$this->ensureRights()) {
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["type"]) || !isset($_POST["start"]) ||
                    !isset($_POST["end"]) || !isset($_POST["percent"]) || !isset($_POST["amount"])) {
                    $this->render();
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
                    $this->render(["error" => "Error while creating new discount"]);
                    break;
                }
                $this->redirect(self::INVENTORY);
                break;
            case self::COLOR_EDIT:
                if (!$this->ensureRights()) {
                    break;
                }
                if ($this->id === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $color = Color::getFromId($this->id);
                if ($color === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["code"])) {
                    $this->render(["color" => $color]);
                    break;
                }
                $color->name = $_POST["name"];
                $color->code = $_POST["code"];
                $color->visibility = filter_var($_POST["visibility"] ?? false, FILTER_VALIDATE_BOOLEAN);
                $color->save();
                $this->redirect(self::INVENTORY);
                break;
            case self::SERVICE_EDIT:
                if (!$this->ensureRights()) {
                    break;
                }
                if ($this->id === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $service = Service::getFromId($this->id);
                if ($service === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["description"]) || !isset($_POST["type"]) ||
                    !isset($_POST["price"]) || !isset($_POST["duration"])) {
                    $this->render(["service" => $service]);
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
                if (!$this->ensureRights()) {
                    break;
                }
                if ($this->id === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $discount = Discount::getFromId($this->id);
                if ($discount === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                if (!isset($_POST["name"]) || !isset($_POST["type"]) || !isset($_POST["start"]) ||
                    !isset($_POST["end"]) || !isset($_POST["percent"]) || !isset($_POST["amount"])) {
                    $this->render(["discount" => $discount]);
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
                if (!$this->ensureRights()) {
                    break;
                }
                if ($this->id === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $color = Color::getfromId($this->id);
                if ($color === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $color->remove();
                $this->redirect(self::INVENTORY);
                break;
            case self::SERVICE_DELETE:
                if (!$this->ensureRights()) {
                    break;
                }
                if ($this->id === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $service = Service::getfromId($this->id);
                if ($service === null) {
                    $this->redirect(self::INVENTORY);
                    break;
                }
                $service->remove();
                $this->redirect(self::INVENTORY);
                break;

            default:
                if ($this->ensureRights()) {
                    $this->render();
                }
                break;
        }
    }

    private function formError($error): void {
        $this->render([
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
