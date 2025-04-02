<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$db_name = "lab7";
$host = "localhost";
$user = "root";
$password = "password";
$charset = "utf8mb4";

$source_name = "mysql:host=$host;dbname=$db_name;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

$pdo = new PDO($source_name, $user, $password, $options);
