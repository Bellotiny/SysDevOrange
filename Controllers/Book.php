<?php

include_once "Controllers/Controller.php";

class Book extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/book/" . $action);
    }

    public function route(): void {
        $action = strtolower($_GET['action']) ?? "bookOne";

        $this->render("Book", $action);
    }
}
