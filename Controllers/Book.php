<?php

include_once "Models/Booking.php";
include_once "Models/Service.php";
include_once "Models/Color.php";
include_once "Models/Discount.php";
include_once "Models/User.php";
include_once "Models/Availability.php";
include_once "Models/Image.php";
include_once "Models/Payment.php";
include_once "Controllers/Home.php";

final class Book extends Controller {
    final public const BOOK = "book";
    final public const PAYMENT = "payment";
    final public const CONFIRMATION = "confirmation";

    public function __construct(?string $action = null) {
        parent::__construct($action ?? self::BOOK);
    }

    public function route(): void {
        switch ($this->action) {
            case self::BOOK:
                if (!isset($_POST["serviceType"])) {  // TODO Add more checks
                    self::render(["services" => Service::list(), "colors" => Color::list(), "availabilities" =>Availability::listAvailableTime()]);
                    break;
                }
                var_dump($_POST);
                if (isset($_POST['serviceType']) && is_array($_POST['serviceType'])) {
                    $services = [];
                    foreach ($_POST['serviceType'] as $type => $serviceIds) {
                        $serviceIds = is_array($serviceIds) ? $serviceIds : [$serviceIds];

                        foreach ($serviceIds as $id) {
                            if (is_numeric($id)) {
                                $service = Service::getFromId($id);
                                if ($service) {
                                    $services[] = $service;
                                } else {
                                    echo "Service ID '$id' not found for type '$type'.";
                                }
                            } else {
                                echo "Invalid service ID for type '$type'.";
                            }
                        }
                    }
                    var_dump($services);
                }


                $price = 0;
                foreach ($services as $service) {
                    $price += $service->price;
                }

                $location = isset($_POST['servicePlace']) && $_POST['servicePlace'] == 'home' ? null : ($_POST['servicePlace'] ?? null);
                var_dump($location);
                $colorsJson = array_values(array_filter([
                    $_POST['colorGroupColor1'] ?? null,
                    $_POST['colorGroupColor2'] ?? null,
                    $_POST['colorGroupColor3'] ?? null
                ]));

                $colors = [];

                foreach ($colorsJson as $colorJson) {
                    $color = json_decode($colorJson);
                    if (isset($color->name)) {
                        $colors[] = Color::getFromName($color->name);
                    }
                }
                var_dump($colors);


                if (!empty($_POST['selected_date_time'])) {
                    $selectedDateTime = $_POST['selected_date_time'];
                    $date_time = Availability::getFromDateTime($selectedDateTime);
                }

                var_dump($this->user !== null);
                if ($this->user !== null) {
                    $user = $this->user;
                    var_dump($user );
                } else {
                    var_dump($_POST['firstName'], $_POST['lastName'], $_POST['email']);
                    if (
                        isset($_POST['firstName'], $_POST['lastName'], $_POST['email'])
                    ) {
                        $firstName = $_POST['firstName'];
                        $lastName = $_POST['lastName'];
                        $username = $_POST['email'];

                        $user = User::new($firstName, $lastName, $username);
                        var_dump($user);
                    } else {
                        // Optional: Handle missing POST fields gracefully
                        throw new Exception('Required fields are missing to create a new user.');
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
                if ($services != null && $colors != null && $date_time != null) {
                    $message = $message ?? null;
                    date_default_timezone_set('America/Toronto');
                    $requestDatetime = new DateTime();
                    $datetimeString = $requestDatetime->format('Y-m-d H:i:s');

                    $booking = Booking::new($user, $price, $message, null, $datetimeString, $location);

                    if ($booking != null) {
                        Booking::setGroups($booking, $colors, 'BookingColor');
                        Booking::setGroups($booking, $services, 'BookingService');
                        $date_time->booking = $booking;
                        $date_time->save();
                        if ($images != null) {
                            Booking::setGroups($booking, $images, 'BookingImage');
                        }
                        $customerResponse = Payment::createCustomer($user->firstName . ' ' . $user->lastName, $user->email);

                        //var_dump($customerResponse);
                        if ($customerResponse->isSuccess()) {
                            self::redirect(self::PAYMENT);
                            break;
                        } else {
                            error_log('Customer creation failed: ' . json_encode($customerResponse->getErrors()));
                        }
                        Home::redirect();
                    }
                }
                break;
            case self::PAYMENT:
                if (!isset($_POST["nonce"]) || !isset($_POST["amount"])) {  // TODO Add more checks
                    self::render();
                    break;
                }
                if($_POST['nonce'] && $_POST['amount']){
                    $nonce = $_POST['nonce'];
                    $amount = $_POST['amount'];
                    $paymentResponse = Payment::createPayment($nonce, $amount);
                    if ($paymentResponse->isSuccess()) {
                        Home::redirect();
                    } else {
                        echo "Payment failed: " . $paymentResponse->getErrors()[0]->getDetail();
                    }
                }
                break;
            case self::CONFIRMATION:
                $this->render();
                break;
            default:
                self::redirect();
                break;



//            case "delete":
//                if($this->ensureRights($action)){
//
//                    $bookingID = $_POST['bookingID'] ?? null;
//                    if($bookingID != null){
//                        $booking = Booking::getFromId($bookingID);
//                        if ($booking && $booking->remove()) {
//                            $this->formError($action,'No booking was found');
//                            $this->render('Account','bookinglist');
//                        } else {
//                            $this->formError($action,'No booking was found');
//                        }
//                    }else {
//                        $this->formError($action,'No booking id was found');
//                    }
//                }
//            break;
//            case "view":
//                if($this->ensureRights($action)){
//
//                    $bookingID = $_POST['bookingID'] ?? null;
//                    if($bookingID != null){
//                        $booking = Booking::getFromId($bookingID);
//                        if ($booking != null) {
//                            $this->render('Account','view');
//                        } else {
//                            $this->formError($action,'No booking was found');
//                        }
//                    }else {
//                        $this->formError($action,'No booking id was found');
//                    }
//                }
//            break;
//            case "edit":
//                if($this->ensureRights($action)){
//
//                    $bookingID = $_POST['bookingID'] ?? null;
//                    if($bookingID != null){
//                        $booking = Booking::getFromId($bookingID);
//                        if ($booking != null) {
//                            $this->render('Account','edit');
//                        } else {
//                            $this->formError($action,'No booking was found');
//                        }
//                    }else {
//                        $this->formError($action,'No booking id was found');
//                    }
//                }
//            break;
//            case "deleteOthers":
//                if($this->ensureRights($action)){
//
//                    $bookingIDs = $_POST['bookingID'] ?? null;
//                    if($bookingIDs != null){
//                        $bookings = Booking::getManyFromIds('id' ,$bookingIDs);
//                        if ($bookings != null) {
//                            $errors = [];
//                            foreach ($bookings as $booking) {
//                                if (!$booking->remove()) {
//                                    $errors[] = $booking->id;
//                                }
//                            }
//                            if(empty($errors)) {
//                                $this->render('Account','bookinglist');
//                            } else{
//                                $this->formError($action,'Deleting was not possible for bookings with IDs: ' . implode(', ', $errors));
//                            }
//                        } else {
//                            $this->formError($action,'No bookings were found');
//                        }
//                    }else {
//                        $this->formError($action,'No booking ids were found');
//                    }
//                }
//            break;
//            case "viewOthers":
//                if($this->ensureRights($action)){
//
//                    $bookingID = $_POST['bookingID'] ?? null;
//                    if($bookingID != null){
//                        $booking = Booking::getFromId($bookingID);
//                        if ($booking != null) {
//                            $this->render('Account','view');
//                        } else {
//                            $this->formError($action,'No booking was found');
//                        }
//                    } else {
//                        $this->formError($action,'No booking id was found');
//                    }
//                }
//            break;
//            case "editOthers":
//                if($this->ensureRights($action)){
//
//                    $bookingID = $_POST['bookingID'] ?? null;
//                    if($bookingID != null){
//                        $booking = Booking::getFromId($bookingID);
//                        if ($booking != null) {
//                            $this->render('Account','edit');
//                        } else {
//                            $this->formError($action,'No booking was found');
//                        }
//                    }else {
//                        $this->formError($action,'No booking id was found');
//                    }
//                }
//            break;
        }
    }
}
