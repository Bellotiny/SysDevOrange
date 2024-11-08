<?php

include_once "Controllers/Controller.php";
include_once "Models/Booking.php";
include_once "Models/Service.php";
include_once "Models/Discount.php";
include_once "Models/Payment.php";
include_once "Models/User.php";

class Book extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/book/" . $action);
    }

    public function route(): void {
        $action = strtolower($_GET['action']) ?? "bookOne";

        switch ($action) {
            case "list":
                
            break;
            case "add":
                $data = isset($_POST[]);
                $services = Service::list();
                $colors = Color::list();
                $user = User::add();
                $this->render("Book", "book", ["services" => $services, "colors" => $colors]);
            break;
            case "delete":
                if($this->verifyRights($action)){

                }
            break;
            case "view":
                if($this->verifyRights($action)){
                    
                }
            break;
            case "edit":
                if($this->verifyRights($action)){

                }
            break;
            case "deleteOthers":
                if($this->verifyRights($action)){

                }
            break;
            case "viewOthers":
                if($this->verifyRights($action)){

                }
            break;
            case "editOthers":
                if($this->verifyRights($action)){

                }
            break;
                
        }

        $this->render("Book", $action);
    }
}
