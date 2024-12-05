<?php

include_once "Models/Booking.php";
include_once "Models/Service.php";
include_once "Models/Color.php";
include_once "Models/Discount.php";
include_once "Models/User.php";
include_once "Models/Availability.php";
include_once "Controllers/Home.php";

final class Book extends Controller {
    public function route(): void {
        $action = strtolower($_GET['action'] ?? "list");

        switch ($action) {
            case "list":
                $this->render("Book", "bookOne", ["services" => Service::list(), "colors" => Color::list(), "availabilities" =>Availability::list()]);
            break;
            case "add":
                var_dump($_POST);
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
                $colorsJson = array_values(array_filter([
                    $_POST['colorGroupColor1'] ?? null,
                    $_POST['colorGroupColor2'] ?? null,
                    $_POST['colorGroupColor3'] ?? null
                ]));
                $colors = [];
                foreach ($colorsJson as $colorJson) {
                    $colors[] = Color::getFromName($colorJson->name);
                }
                $date_time = $_POST['selected_date_time'] ?? null;
                if($this->user != null){
                    $user = $this->user;
                } else{
                    if(isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['username'])){
                        $user = User::new($_POST['firstName'], $_POST['lastName'], $_POST['username']);
                    }
                }
                //$message = $_POST['message'] ?? null;
                //$images = $_POST[''] ?? null;
                var_dump($user);
                var_dump($user->id);
                var_dump($price);
                var_dump($date_time);
                var_dump($location);
                if($services != null||$colors != null||$date_time != null){
                    $booking = Booking::new($user, $price, null, null, $date_time, $location);
                    if($booking != null){
                        Booking::setGroups($booking, $colors, 'BookingColor');
                        Booking::setGroups($booking, $services, 'BookingService');
                        //Booking::setGroups($booking, $images, 'BookingImage');
                        Home::redirect();
                    }
                    //Home::redirect();
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
