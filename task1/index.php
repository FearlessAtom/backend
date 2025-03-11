<?php
    $small_font_size = 40;
    $medium_font_size = 50;
    $large_font_size = 60;

    $default_font_size = $medium_font_size;
    
    if (isset($_GET["font-size"]))
    {
        setcookie("font-size", $_GET["font-size"], time() + 3600, "/");
    }

    $font_size = ($_GET["font-size"] ?? $_COOKIE["font-size"]) ?? $default_font_size;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="styles.css">
    <style>
        button
        {
            font-size: <?= $font_size; ?>px;
        }
    </style>
</head>
<body>
    <a href="?font-size=<?=($small_font_size ? $small_font_size : $default_font_size)?>"><button>Small font</button></a>
    <a href="?font-size=<?=($medium_font_size ? $medium_font_size : $default_font_size)?>"><button>Medium font</button></a>
    <a href="?font-size=<?=($large_font_size ? $large_font_size : $default_font_size)?>"><button>Large font</button></a>
</body>
</html>
