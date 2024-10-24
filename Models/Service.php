<?php
    include_once dirname(__DIR__) . "/Models/Model.php";

    class Service extends Model{

        private $serviceID;
        private $name;
        private $price;
        private $description;
        private $duration;
        private $services;

        function __construct($id = -1){
            
        }

        static function list(){

        }

        function update(){

        }

        function insert(){

        }

        function delete(){

        }

    }

?>