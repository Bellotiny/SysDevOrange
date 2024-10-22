<?php

// include_once "Models/about.php";
include_once "Controllers/Controller.php";

class ContactController extends Controller{

	function route(){
    $this->render("Contact","contact", array());
     

	}

}

?>