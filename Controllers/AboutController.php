<?php

include_once "Models/about.php";
include_once "Controllers/Controller.php";

class AboutController extends Controller{

	function route(){
    $this->render("About","about", array());
     

	}

}

?>