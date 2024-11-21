<?php

use Random\RandomException;

include_once "Models/User.php";
include_once "Models/Service.php";
include_once "Models/Color.php";
include_once "Controllers/Controller.php";
include_once "Controllers/Home.php";

class Account extends Controller {
    public static function redirect(string $action = "personalInformation"): void {
        header('Location: ' . BASE_PATH . "/account/" . $action);
    }

    public function route(): void {
        $action = strtolower($_GET['action'] ?? "personalInformation");
       var_dump($action);
        switch ($action) {
           
            case "login":
                if (!isset($_POST['email']) || !isset($_POST['password'])) {
                    $this->render("Account", "login");
                    break;
                }
                $user = User::getFromEmailPassword($_POST['email'], $_POST['password']);
                if ($user === null) {
                    $this->render("Account", "login", ["error" => "Invalid Email or Password", "email" => $_POST['email']]);
                    break;
                }
                try {
                    $code = random_int(100000, 999999);
                } catch (Exception) {
                    $this->render("Account", "login", ["error" => "Error While Generating 2FA Code. Try Again Later", "email" => $_POST['email']]);
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
                    $this->render("Account", "2fa");
                    break;
                }
                session_start();
                if (!isset($_SESSION["user"]) && !isset($_SESSION["code"]) && !isset($_SESSION["time"]) && !isset($_SESSION["tries"])) {
                    self::redirect("login");
                    break;
                }
                var_dump($_SESSION["code"]);
                if ($_SESSION["time"] + 300 <= time()) {  // Cannot take more than 5 minutes to enter the code
                    $this->render("Account", "2fa", ["error" => "Timer expired, login again to get a new code"]);
                    session_destroy();
                    break;
                }
                if ($_SESSION["code"] != $_POST["code"]) {
                    $_SESSION["tries"]++;
                    if ($_SESSION["tries"] > 3) {  // Cannot try more than 3 times to enter the code
                        $this->render("Account", "2fa", ["error" => "Too many tries, login again to get a new code"]);
                        session_destroy();
                    } else {
                        $this->render("Account", "2fa", ["error" => "Invalid Code"]);
                    }
                    break;
                }
                try {
                    self::login($_SESSION["user"]);
                } catch (Exception) {
                    $this->render("Account", "2fa", ["error" => "Error While Generating Token. Try Again Later", "email" => $_POST['email']]);
                }
                session_destroy();
                break;
            case "register":
                if (!isset($_POST['firstName']) || !isset($_POST['lastName']) || !isset($_POST['email']) || !isset($_POST['password']) || !isset($_POST['confirmPassword'])) {
                    $this->render("Account", "register");
                    break;
                }
                if ($_POST['password'] != $_POST['confirmPassword']) {
                    $this->error("register", "Passwords do not match");
                    break;
                }
                $_POST['email'] = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
                if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $this->error("register", "Invalid Email format");  // TODO Improve this error message
                    break;
                }
                if (!preg_match("/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&_])[A-Za-z\d@$!%*?&_]{6,}$/", $_POST['password'])) {
                    $this->error("register", "The password must be at least 6 characters long and include at least one number, one symbol, one lowercase letter, and one uppercase letter");
                    break;
                }
                if ($_POST['phoneNumber']) {
                    $_POST['phoneNumber'] = filter_var($_POST['phoneNumber'], FILTER_SANITIZE_NUMBER_INT);
                }
                if ($_POST['birthDate']) {
                    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST['birthDate'])) {
                        $this->error("register", "Invalid Birth Date format");
                        break;
                    }
                }
                $user = User::new($_POST['firstName'], $_POST['lastName'], $_POST['email'], $_POST['password'], $_POST['phoneNumber'] ?? null, $_POST['birthDate'] ?? null);
                if ($user === null) {
                    $this->error("register", "Email already in use");
                    break;
                }
                try {
                    self::login($user);
                } catch (Exception) {
                    $this->error("register", "Unable to generate token. Try Again Later");
                }
                break;
            case "forgot":
                $this->render("Account", "forgot");
                break;
            case "logout":
                setcookie("token", "", -1, "/");  // Remove cookie "token" from the user's browser
                Home::redirect();
                break;
                // Wrote this to render forgot.php for forgetting password
            case "forgot":
                $this->render("Account", $action);
                 break;
            case "inventory":
                $services = Service::list();
                $colors = Color::list();
                    
                $this->render("Account", $action, data: ["services" => $services, "colors" => $colors, "user" => $this->user]);
        
                break;
            case "createColor"://create new color
              
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Check if required fields are filled
                    //var_dump(empty($_POST['name']) || empty($_POST['code'])   || empty($_POST['visibility']));
                    if (empty($_POST['name']) || empty($_POST['code'])   || empty($_POST['visibility'])) {
                        $data['error'] = 'Name and Code are required.';
                        $colors = Color::list();
                        $services = Service::list();
                        $this->render("Account", "inventory", data:["services" => $services, "colors" => $colors, "user" => $this->user, "data" => $data]);
                        break;
                    }
                     
                         // Create the new service
                         $color = Color::new(
                             $_POST['name'],
                             $_POST['code'], 
                             (int)$_POST['visibility']
                         );
                     
                         $this->redirect("inventory");
                         break;
                     
                     }
     
                     $this->render("Account", $action);
                 
                     break;
            case "createService"://create new service
              
               if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Check if required fields are filled
                    if (empty($_POST['name']) || empty($_POST['type']) || empty($_POST['price']) || empty($_POST['description']) || empty($_POST['duration']) || empty($_POST['visibility'])) {
                        $data['error'] = 'Complete the inputs';
                        $colors = Color::list();
                        $services = Service::list();
                        $this->render("Account", "inventory", data:["services" => $services, "colors" => $colors,"user" => $this->user,  "data" => $data]);
                        break;
                    }
                
                    // Create the new service
                    $service = Service::new(
                        $_POST['name'],
                        (float)$_POST['price'],
                        $_POST['description'],
                        (int)$_POST['duration'],
                        $_POST['type'], 
                        (int)$_POST['visibility']
                    );
                
                    $this->redirect("inventory");
                    break;
                
                }

                $this->render("Account", $action);
            
                break;
            case "editColor"://edit color l
                $color = Color::getFromId((int)$_GET['id']);

                if (is_null($color)) {
                    $data['error'] = 'Color not found';
                    $colors = Color::list();
                    $services = Service::list();
                    $this->render("Account", "inventory", data:["services" => $services, "colors" => $colors, "user" => $this->user, "data" => $data]);
                    break;
                }

                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    //service 
                   
                    if (!isset($_POST['name']) && !isset($_POST['code']) &&
                        !isset($_POST['visibility'])) {
    
                        $data['error'] = 'Every inputs must filled';
                        $colors = Color::list();
                        $services = Service::list();
                        $this->render("Account", "inventory", data:["services" => $services, "colors" => $colors, "user" => $this->user, "data" => $data]);
                        break;
                    }

                        $visibility = isset($_POST['visibility']) ? 1 : 0;

                        $color->name = $_POST['name'];
                        $color->code = $_POST['code'];
                        $color->visibility =  $visibility ;

                        $color->save();
                        $this->redirect("inventory");     

                }
             
                    $this->render("Account", $action, ['color'=> $color]);
               
                break;
            case "editService"://edit service
                $service = Service::getFromId((int)$_GET['id']);
    
                if (is_null($service)) {
                    $data['error'] = 'Service not found';
                    $colors = Color::list();
                    $services = Service::list();
                    $this->render("Account", "inventory", data:["services" => $services, "colors" => $colors, "user" => $this->user, "data" => $data]);
                    break;
                }
    
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        //service 
                       
                    if (!isset($_POST['name']) && !isset($_POST['type']) &&
                        !isset($_POST['price']) && !isset($_POST['description']) &&
                        !isset($_POST['duration']) && !isset($_POST['visibility'])) {
        
                        $data['error'] = 'Every inputs must filled';
                        $colors = Color::list();
                        $services = Service::list();
                        $this->render("Account", "inventory", 
                        data:["services" => $services, "colors" => $colors, "user" => $this->user, "data" => $data]);
                        break;
                    }


                       $visibility = isset($_POST['visibility']) ? 1 : 0;
    
                        $service->name = $_POST['name'];
                        $service->type = $_POST['type'];
                        $service->price = $_POST['price'];
                        $service->description = $_POST['description'];
                        $service->duration = $_POST['duration'];
                        $service->visibility =  $visibility ;
    
                        $service->save();
                        $this->redirect("inventory");     
    
                }
                 
                    $this->render("Account", $action, ['service'=> $service]);
                   
                break;
            case "deleteColor"://dekete color
                $color = Color::getfromId((int)$_GET['id']);
                
                if (is_null($color)) {
                    $data['error'] = 'Color is not found';
                    $colors = Color::list();
                    $services = Service::list();
                    $this->render("Account", "inventory", 
                    data:["services" => $services, "colors" => $colors, "user" => $this->user, "data" => $data]);
                    break;
                }
                $color->delete();
                $this->redirect("inventory");

                
                break;
            case "deleteService"://delete service
                $service = Service::getfromId((int)$_GET['id']);
                    
                if (is_null($service)) {
                    $data['error'] = 'Service not found';
                    $colors = Color::list();
                    $services = Service::list();
                    $this->render("Account", "inventory", 
                    data:["services" => $services, "colors" => $colors, "user" => $this->user, "data" => $data]);
                    break;
                }
                $service->delete();
                $this->redirect("inventory");
    
                    
                break;
            default:
                if ($this->verifyRights($action)) {
                    $this->render("Account", $action, [$this->user]);
                }
                break;
        }
    }

    /**
     * @throws RandomException
     */
    private static function login(User $user): void {
        $token = hash("sha256", $user->id . "06BlK0dFkhC1LVf9" . bin2hex(random_bytes(16)));
        setcookie("token", $token, time() + 34560000, "/");
        $user->setToken($token);
        self::redirect();
    }

    private function error($action, $error): void {
        $this->render("Account", $action, [
                "error" => $error,
                "firstName" => $_POST['firstName'],
                "lastName" => $_POST['lastName'],
                "email" => $_POST['email'],
                "phoneNumber" => $_POST['phoneNumber'],
                "birthDate" => $_POST['birthDate'],
            ]
        );
    }
}
