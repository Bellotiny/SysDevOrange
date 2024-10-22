<?php

include_once "Models/about.php";
include_once "Controllers/Controller.php";

class GalleryController extends Controller{

	function route(){
    $this->render("Gallery","gallery", array());
     

	}

}

?>