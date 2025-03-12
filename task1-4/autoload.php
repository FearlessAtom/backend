<?php

spl_autoload_register(function ($class)
{
    $class = str_replace("\\", "/", $class);

    $ext = ".php";

    $path = "";

    $file_full_path = $path . $class . $ext;

    if (!file_exists($file_full_path))
    {
        return false;
    }

    include_once $file_full_path;
});
