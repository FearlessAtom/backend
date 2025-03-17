<?php
include_once "../db.php";
include_once "../utils.php";

global $pdo;

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (find_by_user_name($_POST["user-name"]))
    {
        echo "Username is taken!<br>";
    }

    else if (find_by_email_address($_POST["email-address"]))
    {
        echo "Email address is taken!<br>";
    }


    else if ($_POST["password"] != $_POST["confirm-password"])
    {
        echo "Passwords do not match";
    }
    
    else
    {
        create_user($_POST["user-name"], $_POST["email-address"], $_POST["password"]);
        header("Location: /task1/login");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post">
        <div class="form-container">
            <div class="inputs">
                <div>
                <input value="<?=$_POST["user-name"] ?? ""?>" required type="text" name="user-name" placeholder="Username">
                </div>

                <div>
                    <input value="<?=$_POST["email-address"] ?? ""?>" required type="email"
                        name="email-address" placeholder="Email Address">
                </div>

                <div>
                    <input required type="password" minlength="8" maxlength="32" name="password" placeholder="Password">
                </div>

                <div>
                    <input required type="password" minlength="8" maxlength="32" name="confirm-password"
                        placeholder="Confirm Password">
                </div>

                <div style="width: 100%; display: flex; justify-content: flex-end">
                    <input style="margin-left: auto" type="submit" value="Sign up">
                </div>
            </div>

            <p class="prompt">Already have an account? <a href="../login/index.php">Sign in</a></p>
        </div>
    </form>
</body>
</html>
