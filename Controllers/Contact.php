<?php

include_once "Controllers/Controller.php";

class Contact extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/contact/" . $action);
    }

    public function route(): void {
        $this->render("Contact", "contact");
    }
}