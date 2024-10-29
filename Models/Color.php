<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class Color extends Model{

        private $colorID;
        private $name;
        private $code;
        private $colors;

        private function __construct($id = -1){
            parent::__construct();

            $this->colorID = $id;
            if($id<0){
                $this->name = "";
                $this->code = "";
                $this->colors = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `color` WHERE `colorID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->colorID = $id;
                $this->name = $data['name'];
                $this->code = $data['code'];
                $this->colors = $data['colors'];
                
            }
        }

        private static function listColor(){
            $this->list('color','Color');
        }

        private function updateColor($data, $id){
            $this->update('color', $data, $id);
        }

        private function insertColor($table, $data){
            $this->insert($table, $data);
        }

        private function deleteColor($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>