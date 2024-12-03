<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

define("BASE_PATH", dirname($_SERVER['SCRIPT_NAME']));

// Determine the language from the query parameter or cookie
 define("lang", $_GET['lang'] ?? ($_COOKIE['lang'] ?? "en"));
// Validate the language input to prevent unexpected values
// if (!in_array(lang, ["en", "fr"])) {
//     lang = "en"; 
// }// Default to English if the input is invalid
$controller = ucfirst($_GET['controller'] ?? "home");
include_once "Controllers/Controller.php";
include_once "language/".lang.".php";
include_once "Controllers/$controller.php";

setcookie("lang", lang, time() + 34560000, "/");  // Reset lang cookie duration to 400 days

$ct = new $controller();
$ct->route();