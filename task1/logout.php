<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    session_start();

    $_SESSION["user-id"] = null;

    header("Location: /task1/login");
    exit;
}

else
{
    header("Location: /task1/profile");
}
