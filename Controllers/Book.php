<?php

include_once "Models/Booking.php";
include_once "Models/Service.php";
include_once "Models/Color.php";
include_once "Models/Discount.php";
include_once "Models/User.php";
include_once "Models/Availability.php";
include_once "Models/Image.php";
include_once "Controllers/Home.php";

final class Book extends Controller {
    public function route(): void {
        $action = strtolower($_GET['action'] ?? "list");

        switch ($action) {
            case "list":
                $this->render("Book", "bookOne", ["services" => Service::list(), "colors" => Color::list(), "availabilities" =>Availability::listAvailableTime()]);
            break;
            case "add":
                //var_dump($_POST);
                $services = [];
                if (isset($_POST['serviceType'])) {
                    foreach ($_POST['serviceType'] as $type => $serviceJson) {
                        $selectedService = json_decode($serviceJson);
                        $service = Service::getFromName($selectedService->name);
            
                        $services[] = $service;
                    }
                }

                $price = 0;
                foreach ($services as $service) {
                    $price += $service->price;
                }

                $location = isset($_POST['servicePlace']) && $_POST['servicePlace'] == 'home' ? null : ($_POST['servicePlace'] ?? null);
                var_dump($_POST['servicePlace']);
                $colorsJson = array_values(array_filter([
                    $_POST['colorGroupColor1'] ?? null,
                    $_POST['colorGroupColor2'] ?? null
                ]));
                
                $colors = [];
                foreach ($colorsJson as $colorJson) {
                    $color = json_decode($colorJson);
                    if (isset($color->name)) {
                        $colors[] = Color::getFromName($color->name);
                    }
                }


                if (!empty($_POST['selected_date_time'])) {
                    $selectedDateTime = $_POST['selected_date_time'];
                    $date_time = Availability::getFromDateTime($selectedDateTime);
                }
                
                
                if($this->user != null){
                    $user = $this->user;
                } else{
                    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username'])){
                        $user = User::new($_POST['firstName'], $_POST['lastName'], $_POST['username']);
                    }
                }

                $message = $_POST['message'] ?? null;      
                $images = [];
                
                if (isset($_FILES["image"]) && !empty($_FILES["image"]["name"][0])) {
                    foreach ($_FILES["image"]["name"] as $key => $name) {
                        if (!empty($name) && is_uploaded_file($_FILES["image"]["tmp_name"][$key])) {
                            $extension = pathinfo($name, PATHINFO_EXTENSION);
                            $filename = pathinfo($name, PATHINFO_FILENAME);
                
                            // Create a new image instance (assume Image::new handles image creation)
                            $newImage = Image::new($filename, $extension);
                
                            // Move the uploaded file to the destination path
                            if (move_uploaded_file($_FILES["image"]["tmp_name"][$key], $newImage->getPath())) {
                                $images[] = $newImage; // Add to the images array
                            } else {
                                error_log("Failed to move uploaded file: $name");
                            }
                        }
                    }
                } else {
                    error_log("No images were uploaded.");
                }

                echo '<pre>';
                var_dump($services);
                var_dump($colors);
                var_dump($date_time->timeSlot);
                var_dump($location);
                echo '</pre>';
                if ($services != null && $colors != null && $date_time != null && $location != null) {
                    $message = $message ?? null;
                    $booking = Booking::new($user, $price, $message, null, $date_time->timeSlot, $location);
                
                    var_dump($booking);
                    if ($booking != null) {
                        Booking::setGroups($booking, $colors, 'BookingColor');
                        Booking::setGroups($booking, $services, 'BookingService');
                        $date_time->booking = $booking;
                        $date_time->save();
                        if ($images != null) {
                            Booking::setGroups($booking, $images, 'BookingImage');
                        }
                        
                        Home::redirect();
                    }
                }
            break;
            case "delete":
                if($this->verifyRights($action)){

                    $bookingID = $_POST['bookingID'] ?? null;
                    if($bookingID != null){
                        $booking = Booking::getFromId($bookingID);
                        if ($booking && $booking->remove()) {
                            $this->formError($action,'No booking was found');
                            $this->render('Account','bookinglist');
                        } else {
                            $this->formError($action,'No booking was found');
                        }
                    }else {
                        $this->formError($action,'No booking id was found');
                    }
                }
            break;
            case "view":
                if($this->verifyRights($action)){
                    
                    $bookingID = $_POST['bookingID'] ?? null;
                    if($bookingID != null){
                        $booking = Booking::getFromId($bookingID);
                        if ($booking != null) {
                            $this->render('Account','view');
                        } else {
                            $this->formError($action,'No booking was found');
                        }
                    }else {
                        $this->formError($action,'No booking id was found');
                    }
                }
            break;
            case "edit":
                if($this->verifyRights($action)){

                    $bookingID = $_POST['bookingID'] ?? null;
                    if($bookingID != null){
                        $booking = Booking::getFromId($bookingID);
                        if ($booking != null) {
                            $this->render('Account','edit');
                        } else {
                            $this->formError($action,'No booking was found');
                        }
                    }else {
                        $this->formError($action,'No booking id was found');
                    }
                }
            break;
            case "deleteOthers":
                if($this->verifyRights($action)){

                    $bookingIDs = $_POST['bookingID'] ?? null;
                    if($bookingIDs != null){
                        $bookings = Booking::getManyFromIds('id' ,$bookingIDs);
                        if ($bookings != null) {
                            $errors = [];
                            foreach ($bookings as $booking) {
                                if (!$booking->remove()) {
                                    $errors[] = $booking->id;
                                }
                            }
                            if(empty($errors)) {
                                $this->render('Account','bookinglist');
                            } else{
                                $this->formError($action,'Deleting was not possible for bookings with IDs: ' . implode(', ', $errors));
                            }
                        } else {
                            $this->formError($action,'No bookings were found');
                        }
                    }else {
                        $this->formError($action,'No booking ids were found');
                    }
                }
            break;
            case "viewOthers":
                if($this->verifyRights($action)){

                    $bookingID = $_POST['bookingID'] ?? null;
                    if($bookingID != null){
                        $booking = Booking::getFromId($bookingID);
                        if ($booking != null) {
                            $this->render('Account','view');
                        } else {
                            $this->formError($action,'No booking was found');
                        }
                    } else {
                        $this->formError($action,'No booking id was found');
                    }
                }
            break;
            case "editOthers":
                if($this->verifyRights($action)){

                    $bookingID = $_POST['bookingID'] ?? null;
                    if($bookingID != null){
                        $booking = Booking::getFromId($bookingID);
                        if ($booking != null) {
                            $this->render('Account','edit');
                        } else {
                            $this->formError($action,'No booking was found');
                        }
                    }else {
                        $this->formError($action,'No booking id was found');
                    }
                }
            break;
                
        }

        // $this->render("Book", $action);
    }
}
