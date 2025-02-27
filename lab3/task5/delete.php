<?php
    require("utils.php");

    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        delete_user();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <form action="delete.php" method="post">
            <input required type="login" name="login" placeholder="Login">
            <input required type="password" name="password" placeholder="Password">
            <input type="submit" value="Delete">
        </form>
    </div>
</body>
</html>
