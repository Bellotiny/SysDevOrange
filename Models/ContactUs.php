<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class ContactUs extends Model{

        private $contactUsID;
        private $message;
        private $user;

        private function __construct($id = -1){
            parent::__construct();

            $this->contactUsID = $id;
            if($id<0){
                $this->message = "";
                $this->user = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `contactUs` WHERE `contactUsID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->contactUsID = $id;
                $this->message = $data['message'];
                $this->user = $data['user'];
                
            }
        }

        private static function listContactUs(){
            $this->list('contactUs','ContactUs');
        }

        private function updateContactUs($data, $id){
            $this->update('contactUs', $data, $id);
        }

        private function insertContactUs($table, $data){
            $this->insert($table, $data);
        }

        private function deleteContactUs($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>