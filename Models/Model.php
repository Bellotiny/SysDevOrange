<?php

    class Model{

        private $controller = isset($_GET['controller']) ? $_GET['controller'] : "home"   ;
        private $action = isset($_GET['action']) ? $_GET['action'] : "list"   ;
        private $id = isset($_GET['id']) ? intval($_GET['id']) : -1;

        function __construct($id = -1){
            $server = "localhost";
            $user = "root";
            $pass = "";
            $db = "classicmodels";

            $conn = new mysqli($server, $user, $pass, $db);

            if($conn->connect_error){
                die("Connection error! I can't deal with this anymore<br>" . $conn->connect_error);
            }
        }
    }
    
?>