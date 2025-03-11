<?php
    session_start();
    #session_unset();

    $login = "Admin";
    $password = "password";

    if ($_POST["login"] == $login && $_POST["password"] == $password)
    {
        $_SESSION["is_authorized"] = "true";
    }

    if ($_SESSION["is_authorized"] == "true")
    {
        echo "Hi, Admin!";

        return;
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
    <form action="index.php" method="post">
        <input type="text" placeholder="Login" name="login" value="<?= (isset($_POST["login"]) ? $_POST["login"] : "") ?>">
        <input type="password" placeholder="Password" name="password"
            value="<?= (isset($_POST["password"]) ? $_POST["password"] : "") ?>">
        <input type="submit" value="Done">
    </form>
</body>
</html>
