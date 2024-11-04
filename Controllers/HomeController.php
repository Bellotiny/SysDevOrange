<?php

include_once "Controllers/Controller.php";

class HomeController extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/" . $action);
    }

    public function route(): void {
        $this->render("Home", "home");
    }
}