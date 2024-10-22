<?php

include_once "Models/about.php";
include_once "Controllers/Controller.php";

class AccountController extends Controller{

	function route(){
    $this->render("Account","account", array());
     

	}

}

?>