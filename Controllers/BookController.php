<?php

include_once "Models/about.php";
include_once "Controllers/Controller.php";

class BookController extends Controller{

	function route(){

		$action = (isset($_GET['action'])) ? $_GET['action'] : "bookOne";

		if($action == "bookOne"){
			$this->render("Book","bookOne", array());

		}else if($action == "bookTwo"){
			$this->render("Book","bookTwo", array());

		}else if($action == "bookThree"){
			$this->render("Book","bookThree", array());

		}




     

	}

}

?>