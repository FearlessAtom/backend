<?php

$EstimatedResolutionTime = time() + 60 * 60 * 5;
$DateFormat = "d.m.Y h:m";

register_shutdown_function(function() use($DateFormat, $EstimatedResolutionTime)
{
    if (!error_get_last()) return;

    ob_clean();
    echo "We are currently experiencing an issue.\n";
    echo "We expect everything to be resolved by: " . date($DateFormat, $EstimatedResolutionTime) . "\n";
    http_response_code(500);
});

ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>

<?php
    $data = json_decode(file_get_contents("php://input"));

    print_r($data);

    if (isset($data->error) && $data->error === "true")
    {
        throw new Error("Exception is thrown!");
    }
?>

<body>
    <h1>Some page</h1>
</body>
</html>

<?php

$page = ob_get_contents();
ob_clean();

echo $page;
http_response_code(200);

?>
