<?php
    require("utils.php");

    $folder = "users/";
    $user_folders = array("video", "music", "photo");

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        create_user($folder, $user_folders);
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
        <form action="index.php" method="post">
            <input required type="login" name="login" placeholder="Login">
            <input required type="password" name="password" placeholder="Password">
            <input type="submit" value="Done">
        </form>
    </div>
</body>
</html>
