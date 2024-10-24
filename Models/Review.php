<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class Review extends Model{

        private $reviewID;
        private $user;
        private $message;
        private $date;
        private $images;

        private function __construct($id = -1){
            parent::__construct();

            $this->reviewID = $id;
            if($id<0){
                $this->user = "";
                $this->message = "";
                $this->date = "";
                $this->images = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `review` WHERE `reviewID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->reviewID = $id;
                $this->user = $data['user'];
                $this->message = $data['message'];
                $this->date = $data['date'];
                $this->images = $data['images'];
                
            }
        }

        private static function listReview(){
            $this->list('review','Review');
        }

        private function updateReview($data, $id){
            $this->update('review', $data, $id);
        }

        private function insertReview($table, $data){
            $this->insert($table, $data);
        }

        private function deleteReview($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>