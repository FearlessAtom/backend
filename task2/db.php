<?php

$host = "localhost";
$user = "homeuser";
$db_name = "lab5";
$charset = "utf8mb4";
$password = "someuser";

$source_name = "mysql:host=$host;dbname=$db_name;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try
{
    $pdo = new PDO($source_name, $user, $password, $options);
}

catch (PDOException $e)
{
    echo "Error creating a PDO!";
    exit;
}

