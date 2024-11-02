<?php

class Controller {
    function route() {}

    function getUser(): User|bool {
        if (isset($_COOKIE['token'])) {
            return User::getFromToken($_COOKIE['token']);
        } else {
            return false;
        }
    }

    function render($controller, $view, $data = []): void {
        extract($data);
        include "Views/$controller/$view.php";
    }
}