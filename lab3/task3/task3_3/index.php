<?php
    if ($argc !== 2)
    {
        die ("Usage: php " . ($argv[0] ?? "index.php") . " <filename>\n");
    }

    $file_path = $argv[1];

    if (!file_exists($file_path))
    {
        die ("File " . $file_path . " does not exist!\n");
    }

    $file = fopen($file_path, "r+");

    $content = str_replace(["\r", "\n"], "", file_get_contents($file_path));

    $words = explode(" ", $content);

    sort($words);

    fwrite($file, implode(" ", $words));
?>
