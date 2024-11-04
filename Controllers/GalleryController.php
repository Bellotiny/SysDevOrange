<?php

include_once "Controllers/Controller.php";

class GalleryController extends Controller {
    public static function redirect(string $action = ""): void {
        header('Location: ' . BASE_PATH . "/gallery/" . $action);
    }

    public function route(): void {
        $this->render("Gallery", "gallery");
    }
}