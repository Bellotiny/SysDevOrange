<?php

include_once "Controllers/Controller.php";

class About extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/about/" . $action);
    }

    public function route(): void {
        $this->render("About", "about");
    }
}