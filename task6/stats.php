<?php

require_once "db.php";

function get_requests()
{
    global $pdo;

    $query = $pdo->query("select * from requests");

    return $query->fetchAll(PDO::FETCH_OBJ);
}

function get_not_found_within_seconds($seconds=null): mixed
{
    global $pdo;

    $query = $pdo->query("select * from requests where status_code = 404");

    $requests = $query->fetchAll(PDO::FETCH_OBJ);

    if ($seconds == null) return $requests;
    
    $requests = array_filter($requests, function($request) use ($seconds)
    {
        $unix_timestamp = strtotime($request->requested_at);

        $difference = time() - $unix_timestamp;

        if ($difference < $seconds) return true;
        
        return false;
    });

    return $requests;
}

$day_unix_timestamp = 60 * 60 * 24;

$recent_not_found_requests_count = count(get_not_found_within_seconds($day_unix_timestamp));

echo "There were " . $recent_not_found_requests_count . " requests with status code 404 in the past 24 ours." . "<br>\n";

$total_count = count(get_requests());
$total_count_not_found = count(get_not_found_within_seconds());

if ($total_count > 0 && $total_count_not_found / $total_count > 0.1)
{
    echo "Warning! The percentage of 404 errors has exceeded 10% of the total requests.<br>\n" .
        "Please check the server logs and take the necessary actions.";
}
