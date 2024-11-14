<?php

include_once "Controllers/Controller.php";

class Home extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/" . $action);
    }

    public function route(): void {
        $this->render("Home", "home");
    }
}