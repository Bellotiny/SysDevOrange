<?php
include_once 'Views/config.php';

$controller = (isset($_GET['controller'])) ? $_GET['controller'] : "home";
#echo $controller;



$controllerClassName = ucfirst($controller) . "Controller";
#echo $controllerClassName;
//var_dump($controllerClassName);
include_once "Controllers/$controllerClassName.php";

//*
$ct = new $controllerClassName();
$ct->route();
//*/