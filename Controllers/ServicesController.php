<?php

include_once "Controllers/Controller.php";

class ServicesController extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/services/" . $action);
    }

    public function route(): void {
        $this->render("Services", "services");
    }
}