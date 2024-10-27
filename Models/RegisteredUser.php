<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class RegisteredUser extends User{

        private $userID;
        private $firstName;
        private $lastName;
        private $email;
        private $phoneNumber;
        private $password;
        private $admin;

        private function __construct($id = -1){
            parent::__construct();

            $this->userID = $id;
            if($id<0){
                $this->firstName = "";
                $this->lastName = "";
                $this->email = "";
                $this->phoneNumber = "";
                $this->password = "";
                $this->admin = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `registeredusers` WHERE `userID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->userID = $id;
                $this->firstName = $data['firstName'];
                $this->lastName = $data['lastName'];
                $this->email = $data['email'];
                $this->phoneNumber = $data['phoneNumber'];
                $this->password = $data['password'];
                $this->admin = $data['admin'];
                
            }
        }

        private static function listRegisteredUser(){
            $this->list('registeredusers','RegisteredUser');
        }

        private function updateRegisteredUser($data, $id){
            $this->update('registeredusers', $data, $id);
        }

        private function insertRegisteredUser($table, $data){
            $this->insert($table, $data);
        }

        private function deleteRegisteredUser($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>