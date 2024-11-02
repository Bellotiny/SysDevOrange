<?php

class Controller {
    function route() {}

    function render($controller, $view, $data = []): void {
        extract($data);
        include "Views/$controller/$view.php";
    }
}