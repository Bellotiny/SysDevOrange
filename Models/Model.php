<?php

    class Model{

        private $controller;
    
        private $conn;

        function __construct() {
            $this->controller = isset($_GET['controller']) ? $_GET['controller'] : "home";
            
            $this->conn = Model::connectToDatabase();
        }

        private static function connectToDatabase() {
            $server = "localhost";
            $user = "root";
            $pass = "";
            $db = "";

            $conn = new mysqli($server, $user, $pass, $db);

            if ($conn->connect_error) {
                die("Connection error!<br>" . $conn->connect_error);
            }
            
            return $conn;
        }

        private function list($table, $objectClass){
            $list = array();
            $sql = "SELECT * FROM `$table`";
            $result = $this->conn->query($sql);

            while($row = =$result->fetch_assoc()){
                // Create an instance of the child class
                $obj = new $objectClass();

                //Dynamically assign the fetched fields to the object's properties
                foreach($row as $key => $value){
                    if(property_exists($obj, $key)){
                        $obj->$key = $value;
                    }
                }

                array_push($list, $obj);
            }

            return $list;
        }

        private function update($table, $data, $id){
            $setClause = implode(" , ", array_map(function($key){ return "`$key` = ?";}, array_keys($data)));

            $stmt = $this->conn->prepare("UPDATE `$table` SET $setClause WHERE id = ?");

            $types = str_repeat("s", count($data) . "i");

            $params = array_merge(array_values($data), [$id]);
            $stmt->bind_param($types, ...$params);

            if($stmt->execute()){
                echo "Record updated successfully";
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }

        private function insert($table, $data){
            // Get all the column names
            $cloumns = implode(", ", array_keys($data));

            //Create the placeholders(?,?,?,?,?)
            $placeholders = implode(", ", array_fill(0, count($data), "?"));

            // Prepare statement for inserting 
            $stmt = $this->conn->prepare("INSERT INTO `$table` ($cloumns) VALUES ($params)");

            // Data types of each field being inserted
            $types = str_repeat("s", count($data));
            
            $stmt->bind_param($types, ...array_values($data));

            if($stmt->execute()){
                echo "New record created successfully";
            } else{
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        }

        private function delete($table, $fieldID, $id){
            // Create type with int type
            $type = "i";
            if(is_string($id)){
                $type = "s";
            }

            // Prepare statement for deleting
            $stmt = $this->prepare("DELETE FROM `$table` WHERE `$fieldID` = ?");
            $stmt->bind_param($type, $id);
            
            if($stmt->execute()){
                echo "Record dleted successfully";
            } else{
                echo "Error: " . $stmt->error;
            }

            $stmt->close();

        }

    }
    
?>