<?php
    function save_uploaded_file($file, $directory)
    {
        if (!file_exists($directory))
        {
            if (!mkdir($directory))
            {
                echo "Error creating a folder for files!";
                return;
            }
        }

        $file_path = $directory . basename($file["name"]);

        if (!move_uploaded_file($file["tmp_name"], $file_path))
        {
            echo "Error creating a file!";
        }
    }

    $directory = "files/";

    if (isset($_FILES["file"]))
    {
        save_uploaded_file($_FILES["file"], $directory);
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
        <form action="index.php" enctype="multipart/form-data" method="post">
            <input required type="file" name="file">
            <input type="submit" value="Done">
        </form>
    </div>
</body>
</html>
