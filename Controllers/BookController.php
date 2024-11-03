<?php

include_once "Controllers/Controller.php";

class BookController extends Controller {
    function route(): void {
        $action = strtolower($_GET['action']) ?? "bookOne";

        $this->render("Book", $action);
    }
}
