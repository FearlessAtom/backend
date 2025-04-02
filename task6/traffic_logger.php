<?php

require_once "db.php";

function add_request($requested_at, $requested_url, $status_code, $ip_address)
{
    global $pdo;

    $prepare = $pdo->prepare("insert into requests (requested_at, requested_url, status_code, ip_address)" .
        "values (:requested_at, :requested_url, :status_code, :ip_address)");

    $prepare->execute([
        "requested_at" => $requested_at,
        "requested_url" => $requested_url,
        "status_code" => $status_code,
        "ip_address" => $ip_address
    ]);
}

$datetime_format = "Y-m-d H:i";

$ip_address = $_SERVER["REMOTE_ADDR"];
$requested_time = $_SERVER["REQUEST_TIME"];
$requested_url = $_SERVER["REQUEST_URI"];

$status_code = http_response_code();

$data = json_decode(file_get_contents("php://input"));

if (isset($data) && isset($data->code))
{
    $status_code = $data->code;
}

$formatted_requested_time = date($datetime_format, $requested_time);

add_request($formatted_requested_time,  $requested_url, $status_code, $ip_address);
