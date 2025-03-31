<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$cache_file_path = "cache.html";

$data = json_decode(file_get_contents("php://input"));

$id = $data->id ?? null;

if (!isset($id) || $id < 1 || $id > 10)
{
    if (file_exists($cache_file_path))
    {
        unlink($cache_file_path);
    }

    http_response_code(404);
    exit;
}

if (file_exists($cache_file_path))
{
    echo file_get_contents($cache_file_path);
    http_response_code(200);
    exit;
}

ob_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Page</title>
</head>
<body>
    <h1>User id <?=$id?></h1>
</body>
</html>

<?php

$contents = ob_get_contents();
ob_clean();

if (http_response_code() == 200)
{
    file_put_contents($cache_file_path, $contents);s
}

?>
