<?php
    $safe_files = ["index.php", "delete.php", "words_one.txt", "words_two.txt", "styles.css"];

    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        $file_name = $_POST["file-name"];

        if (file_exists($file_name) && !in_array($file_name, $safe_files))
        {
            unlink($file_name);
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
    <form action="delete.php" method="post">
        <select  name="file-name">
            <?php
                $files = array_diff(scandir("./"), array_merge($safe_files, array(".", "..")));

                foreach ($files as $file)
                {
                    echo "<option value=\"$file\">$file</option>";
                }
            ?>

        </select>
        <input type="submit" value="Delete">
    </form>
</body>
</html>
