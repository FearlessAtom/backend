<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    add_employee($_POST["name"], $_POST["position"], $_POST["salary"]);
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="styles.css">
<style>
    form *
    {
        display: block;
        margin-bottom: 5px;
    }

    body
    {
        background-color: white;
    }
</style>
</head>
<body>
    <form method="post">
        <input required type="text" name="name" maxlength="30" placeholder="Employee Name">
        <input required type="text" name="position" maxlength="20" placeholder="Product Position">
        <input required type="number" name="salary" step="0.01" min="0" placeholder="Employee Salary">
        <input type="submit" value="Done">
    </form>
</body>
</html>
