<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "utils.php";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    add_product($_POST["name"], $_POST["cost"], $_POST["quantity"], $_POST["note"]);
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
</style>
</head>
<body>
    <form method="post">
        <input required type="text" name="name" maxlength="30" placeholder="Product Name">
        <input required type="number" name="cost" step="0.01" min="0" placeholder="Product Cost">
        <input required type="number" name="quantity" min="1" placeholder="Product Quantity">
        <textarea required name="note" cols="30" rows="10" maxlength="150" placeholder="Product Note"></textarea>
        <input type="submit" value="Done">
    </form>
</body>
</html>
