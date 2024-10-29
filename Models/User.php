<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class User extends Model{

        private $userID;
        private $firstName;
        private $lastName;
        private $email;
        private $phoneNumber;

        private function __construct($id = -1){
            parent::__construct();

            $this->userID = $id;
            if($id<0){
                $this->firstName = "";
                $this->lastName = "";
                $this->email = "";
                $this->phoneNumber = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `users` WHERE `userID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->userID = $id;
                $this->firstName = $data['firstName'];
                $this->lastName = $data['lastName'];
                $this->email = $data['email'];
                $this->phoneNumber = $data['phoneNumber'];
                
            }
        }

        private static function listUser(){
            $this->list('user','User');
        }

        private function updateUser($data, $id){
            $this->update('user', $data, $id);
        }

        private function insertUser($table, $data){
            $this->insert($table, $data);
        }

        private function deleteUser($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>