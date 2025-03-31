<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$time_format = "m.d.Y H:i:s";
$log_file_path = "requests.log";

$ip_address = $_SERVER["REMOTE_ADDR"];
$request_time = $_SERVER["REQUEST_TIME"];

$data = $ip_address . " | " . date($time_format, $request_time) . "\n";

$file = fopen($log_file_path, "a+");

fwrite($file, $data);

fclose($file);


function validate_limit()
{
    for ()
    {
        
    }
}
