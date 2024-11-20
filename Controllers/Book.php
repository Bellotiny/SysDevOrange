<?php

include_once "Controllers/Controller.php";
include_once "Models/Booking.php";
include_once "Models/Service.php";
include_once "Models/Color.php";
include_once "Models/Discount.php";
include_once "Models/Payment.php";
include_once "Models/User.php";
include_once "Models/Availability.php";

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
                $availabilities = Availability::list() ?: '';
                $this->render("Book", "bookOne", ["services" => $services, "colors" => $colors, "availabilities" => $availabilities]);
            break;
            case "add":
                $services = $_POST['selectedServices'] ?? null;
                $location = ($_POST['servicePlace'] == 'home') ? $_POST['destination'] : $_POST['servicePlace'] ;
                $colors = array_values(array_filter([
                    $_POST['colorGroupColor1'] ?? null,
                    $_POST['colorGroupColor2'] ?? null,
                    $_POST['colorGroupColor3'] ?? null
                ]));
                $date = $_POST['selected_date'] ?? null;
                $time = $_POST['selected_time'] ?? null;
                $userID = (($this->user == null) && (isset($_POST['personalInfo']))) ? $_POST['personalInfo'] : $this->user->id;
                if($services != null||$colors != null||$date != null||$time != null){
                    // $booking = Booking::new($services, $location, $colors, $date, $time, $userID);
                    // if($booking === null){
                    //     $this->error('booking','There was a mistake in the booking');
                    //     break;
                    // }
                }
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
