<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class Image extends Model{

        private $imageID;
        private $name;
        private $date;

        private function __construct($id = -1){
            parent::__construct();

            $this->imageID = $id;
            if($id<0){
                $this->name = "";
                $this->date = "";
            }
            else{
                // Select Statement for listing
                $sql = "SELECT * FROM `image` WHERE `imageID`=" . $id;

                $result = $this->conn->query($sql);

                $data = $result->fetch_assoc();

                // Assign values
                $this->imageID = $id;
                $this->name = $data['name'];
                $this->date = $data['date'];
            }
        }

        private static function listImage(){
            $this->list('image','Image');
        }

        private function updateImage($data, $id){
            $this->update('image', $data, $id);
        }

        private function insertImage($table, $data){
            $this->insert($table, $data);
        }

        private function deleteImage($table, $fieldID, $id){
            $this->delete($table, $fieldID, $id);
        }

    }

?>