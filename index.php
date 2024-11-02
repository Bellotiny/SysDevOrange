<?php

include_once 'Views/config.php';

$controller = $_GET['controller'] ?? "home";

$controllerClassName = ucfirst($controller) . "Controller";
include_once "Controllers/$controllerClassName.php";

$ct = new $controllerClassName();
$ct->route();