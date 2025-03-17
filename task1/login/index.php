<?php

include_once "../db.php";
include_once "../utils.php";

session_start();

if (isset($_SESSION["user-id"]))
{
    header("Location: /task1/profile");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (verify_user($_POST["user-name"], $_POST["password"]))
    {
        session_start();
        $_SESSION["user-id"] = find_by_user_name($_POST["user-name"])->user_id;

        header("Location: /task1/profile");
        exit;
    }

    else
    {
        echo "Invalid creadentials!" . "<br>";
    }
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
    <form method="post">
        <div class="form-container">
            <div class="inputs">
                <div>
                    <input type="text" name="user-name" placeholder="Username">
                </div>
                <div>
                    <input type="password" name="password" placeholder="Password">
                </div>

                <div style="width: 100%; display: flex; justify-content: flex-end">
                    <input style="margin-left: auto" type="submit" value="Sign in">
                </div>
            </div>

            <p class="prompt">Don't have an account yet? <a href="../register/index.php">Sign up</a></p>
        </div>
    </form>
</body>
</html>
