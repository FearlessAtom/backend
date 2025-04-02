<?php

require_once "Logger.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$IpAddress = $_SERVER["REMOTE_ADDR"];
$RequestTime = $_SERVER["REQUEST_TIME"];

if (!Logger::ValidateRateLimit($IpAddress, $RequestTime))
{
    http_response_code(429);
    exit;
}

Logger::AddLog($IpAddress, $RequestTime);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <h1>Some page</h1>
</body>
</html>
