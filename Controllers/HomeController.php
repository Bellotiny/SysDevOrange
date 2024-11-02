<?php

include_once "Controllers/Controller.php";

class HomeController extends Controller {
    function route(): void {
        $this->render("Home", "home");
    }
}