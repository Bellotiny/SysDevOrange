<?php

// include_once "Models/about.php";
include_once "Controllers/Controller.php";

class ServicesController extends Controller{

	function route(){
    $this->render("Services","services", array());
     

	}

}

?>