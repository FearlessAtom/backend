<?php
    if ($_SERVER["REQUEST_METHOD"] !== "POST")
    {
        header("Location: index.php");
        exit();
    }

    session_start();

    $_SESSION["data"] =
    [
        "login" => $_POST["login"] ?? "",
        "password" => $_POST["password"] ?? "",
        "confirm-password" => $_POST["confirm-password"] ?? "",
        "gender" => $_POST["gender"] ?? "",
        "city" => $_POST["city"] ?? "",
        "favorite-games" => $_POST["favorite-games"] ?? "",
        "about-me" => $_POST["about-me"] ?? ""
    ];

    $image_path = null;

    if (isset($_FILES["image"]) && $_FILES["image"]["error"] === UPLOAD_ERR_OK)
    {
        $upload_directory = "uploads/";

        if (!is_dir($upload_directory))
        {
            mkdir($upload_directory, 0755, true);
        }

        $file_name = basename($_FILES["image"]["name"]);
        $upload_file_path = $upload_directory . $file_name;

        $allowed_types = ["image/jpeg", "image/png", "image/gif"];
        $file_type = $_FILES["image"]["type"];

        if (!in_array($file_type, $allowed_types))
        {
            echo "Invalid file type. Only JPEG, PNG, and GIF are allowed.";
            return;
        }

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $upload_file_path))
        {
            $image_path = $upload_file_path;
        }

        else
        {
            echo "File upload error: " . $_FILES["image"]["error"];
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        p
        {
            margin: 0;
        }

        body
        {
            background-color: white;
        }
    </style>
</head>
<body>
    <table>
        <tr>
            <td><p>Login: </p></td>
            <td><p><?=$_POST["login"]?></p></td>
        </tr>

        <tr>
            <td><p>Password: </p></td>
            <td><p>
                <?php
                   echo ($_POST["password"] === $_POST["confirm-password"] ? "Passwords match!" : "Passwords do not match!");
                ?>
            </p></td>
        </tr>

        <tr>
            <td><p>Gender: </p></td>
            <td><p><?=$_POST["gender"]?></p></td>
        </tr>

        <tr>
            <td><p>City: </p></td>
            <td><p><?=$_POST["city"]?></p></td>
        </tr>

        <tr>
            <td><p>Favorite games: </p></td>
            <td><p>
                <?php
                    if (isset($_POST["favorite-games"]) && is_array($_POST["favorite-games"]))
                    {
                        echo htmlspecialchars(implode(", ", $_POST["favorite-games"]));
                    }
                ?>
            </p></td>
        </tr>

        <tr>
            <td><p>About me: </p></td>
            <td><p><?=$_POST["about-me"]?></p></td>
        </tr>

        <tr>
            <td><label for="image">Image: </label></td>
            <td><img style="height: 250px" src="<?= $image_path ?>" alt="Image"></td>
        </tr>
    </table>
</body>
</html>
