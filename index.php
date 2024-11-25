<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("BASE_PATH", dirname($_SERVER['SCRIPT_NAME']));

$lang = $_COOKIE['lang'] ?? "en";
$controller = ucfirst($_GET['controller'] ?? "home");
include_once "Controllers/Controller.php";
include_once "language/$lang.php";
include_once "Controllers/$controller.php";

setcookie("lang", $lang, time() + 34560000, "/");  // Reset lang cookie duration to 400 days

$ct = new $controller();
$ct->route();