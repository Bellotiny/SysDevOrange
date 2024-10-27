<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class Discount extends Model{

        private $discountID;
        private $name;
        private $start;
        private $end;
        private $percent;
        private $amount;
        private $discounts;

        private function __construct($id = -1){
            parent::__construct();

            $this->discountID = $id;
            if($id<0){
                $this->name = "";
                $this->start = "";
                $this->end = "";
                $this->percent = "";
                $this->amount = "";
                $this->discounts = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `discounts` WHERE `discountID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->discountID = $id;
                $this->name = $data['name'];
                $this->start = $data['start'];
                $this->end = $data['end'];
                $this->percent = $data['percent'];
                $this->amount = $data['amount'];
                $this->discounts = $data['discounts'];
                
            }
        }

        private static function listDiscount(){
            $this->list('discounts','Discount');
        }

        private function updateDiscount($data, $id){
            $this->update('discounts', $data, $id);
        }

        private function insertDiscount($table, $data){
            $this->insert($table, $data);
        }

        private function deleteDiscount($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>