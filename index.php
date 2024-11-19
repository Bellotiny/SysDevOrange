<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
define("BASE_PATH", dirname($_SERVER['SCRIPT_NAME']));

$controller = ucfirst($_GET['controller'] ?? "home");
include_once "Controllers/$controller.php";

$ct = new $controller(User::getFromCookie());
$ct->route();