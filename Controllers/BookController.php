<?php

include_once "Controllers/Controller.php";

class BookController extends Controller {
    function route(): void {
        $action = strtolower($_GET['action']) ?? "bookOne";

        $this->render("Book", $action);
//        if ($action == "bookOne") {
//            $this->render("Book", "bookOne");
//        } else if ($action == "bookTwo") {
//            $this->render("Book", "bookTwo");
//        } else if ($action == "bookThree") {
//            $this->render("Book", "bookThree");
//        }
    }
}
