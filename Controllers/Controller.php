<?php

abstract class Controller {
    public abstract static function redirect(string $action = ""): void;

    public abstract function route(): void;

    public function back(): void {
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    public function render($controller, $view, $data = []): void {
        extract($data);
        include "Views/$controller/$view.php";
    }
}