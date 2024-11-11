<?php
define("BASE_PATH", dirname($_SERVER['SCRIPT_NAME']));

$controller = $_GET['controller'] ?? "home";

$controllerClassName = ucfirst($controller) . "Controller";
include_once "Controllers/$controllerClassName.php";

$ct = new $controllerClassName();
$ct->route();