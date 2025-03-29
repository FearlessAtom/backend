<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: *");
header("Access-Control-Allow-Headers: *");

require_once "db.php";

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

spl_autoload_register(function ($class)
{
    require_once __DIR__ . "/Controllers/$class.php";
});

$request_method = $_SERVER["REQUEST_METHOD"];

$parts = explode("/", $_SERVER["REQUEST_URI"]);

if ($parts[1] == "login")
{
    $request_method = "LOGIN";
    $id = null;
}

$id = $parts[2] ?? null;

$class_name = ucfirst($parts[1]) . "Controller";

global $pdo;

$controller = new $class_name($pdo);

$controller->processRequest($request_method, $id);
