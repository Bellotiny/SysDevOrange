<?php

include_once "Controllers/Controller.php";
include_once "Models/Booking.php";
include_once "Models/Service.php";
include_once "Models/Color.php";
include_once "Models/Discount.php";
include_once "Models/Payment.php";
include_once "Models/User.php";

class Book extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/bookOne/" . $action);
    }

    public function route(): void {
        $action = strtolower($_GET['action'] ?? "list");

        switch ($action) {
            case "list":
                //If current user is loggedin
                
                $services = Service::list();
                $colors = Color::list();
                $this->render("Book", "bookOne", ["services" => $services, "colors" => $colors]);
            break;
            case "add":
                if(!isset($_POST['selectedService'])||!isset($_POST['selectedColor'])||!isset($_POST['selected_date'])
                ||!isset($_POST['selected_time']))
                $selectedService = isset($_POST['selectedService']);
                // $data = isset($_POST['']);
                // $services = Service::list();
                // $colors = Color::list();
                // $user = User::add();
                // $this->render("Book", "book", ["services" => $services, "colors" => $colors]);
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

        // $this->render("Book", $action);
    }
}
