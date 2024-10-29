<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class Service extends Model{

        private $serviceID;
        private $name;
        private $price;
        private $description;
        private $duration;
        private $services;

        private function __construct($id = -1){
            parent::__construct();

            $this->serviceID = $id;
            if($id<0){
                $this->name = "";
                $this->price = "";
                $this->description = "";
                $this->duration = "";
                $this->services = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `services` WHERE `serviceID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->serviceID = $id;
                $this->name = $data['name'];
                $this->price = $data['price'];
                $this->description = $data['description'];
                $this->duration = $data['duration'];
                $this->services = $data['services'];
                
            }
        }

        private static function listServices(){
            $this->list('services','Service');
        }

        private function updateService($data, $id){
            $this->update('services', $data, $id);
        }

        private function insertService($table, $data){
            $this->insert($table, $data);
        }

        private function deleteService($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>