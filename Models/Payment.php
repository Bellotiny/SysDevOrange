<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class Payment extends Model{

        private $paymentID;
        private $status;
        private $amount;
        private $dateTime;

        function __construct($id = -1){
            parent::__construct();

            $this->paymentID = $id;
            if($id<0){
                $this->status = "";
                $this->amount = "";
                $this->dateTime = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `payment` WHERE `paymentID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->paymentID = $id;
                $this->status = $data['status'];
                $this->amount = $data['amount'];
                $this->dateTime = $data['dateTime'];
                
            }
        }

        private static function listPayment(){
            $this->list('payment','Payment');
        }

        function updatePayment($data, $id){
            $this->update('payment', $data, $id);
        }

        function insertPayment($table, $data){
            $this->insert($table, $data);
        }

        function deletePayment($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>