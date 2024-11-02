<?php

include_once "Controllers/Controller.php";

class AboutController extends Controller {
    function route(): void {
        $this->render("About", "about");
    }
}