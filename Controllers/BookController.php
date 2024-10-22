<?php

include_once "Models/about.php";
include_once "Controllers/Controller.php";

class BookController extends Controller{

	function route(){
    $this->render("Book","book", array());
     

	}

}

?>