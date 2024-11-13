<?php

include_once "Models/User.php";

define("BASE_PATH", dirname($_SERVER['SCRIPT_NAME']));

$controller = ucfirst($_GET['controller'] ?? "home");
include_once "Controllers/$controller.php";

$ct = new $controller(User::getFromCookie());
$ct->route();