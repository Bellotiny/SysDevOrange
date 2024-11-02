<?php

include_once "Controllers/Controller.php";

class ServicesController extends Controller {
    function route(): void {
        $this->render("Services", "services");
    }
}