<?php

include_once "Controllers/Controller.php";

class ContactController extends Controller {
    function route(): void {
        $this->render("Contact", "contact");
    }
}