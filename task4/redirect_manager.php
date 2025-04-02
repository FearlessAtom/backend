<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

$redirects = json_decode(file_get_contents("redirects.json"), true);

$uri = $_SERVER["REQUEST_URI"];

$uri_parts = explode("/", trim($uri, "/"));

$folder = $uri_parts[0] ?? "";
$path = isset($uri_parts[1]) ? "/" . $uri_parts[1] : "";

if (isset($redirects[$path]))
{
    $new_path = $redirects[$path];

    $new_uri = "/" . $folder . $new_path . "/";

    header("Location: " . $new_uri, true, 301);
    exit;
}

header("HTTP/1.0 404 Not Found");
echo "404 - Not Found";
exit;
