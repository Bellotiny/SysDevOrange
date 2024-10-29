<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class Booking extends Model{

        private $bookingID;
        private $status;
        private $start;
        private $end;
        private $user;
        private $payment;
        private $services;
        private $colors;
        private $discount;
        private $images;

        private function __construct($id = -1){
            parent::__construct();

            $this->bookingID = $id;
            if($id<0){
                $this->status = "";
                $this->start = "";
                $this->end = "";
                $this->user = "";
                $this->payment = "";
                $this->services = "";
                $this->colors = "";
                $this->discount = "";
                $this->images = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `booking` WHERE `bookingID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->bookingID = $id;
                $this->status = $data['status'];
                $this->start = $data['start'];
                $this->end = $data['end'];
                $this->user = $data['user'];
                $this->payment = $data['payment'];
                $this->services = $data['services'];
                $this->colors = $data['colors'];
                $this->discount = $data['discount'];
                $this->images = $data['images'];
                
            }
        }

        private static function listBooking(){
            $this->list('booking','Booking');
        }

        private function updateBooking($data, $id){
            $this->update('booking', $data, $id);
        }

        private function insertBooking($table, $data){
            $this->insert($table, $data);
        }

        private function deleteBooking($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>