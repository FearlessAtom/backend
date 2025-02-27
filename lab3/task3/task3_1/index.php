<?php
    $file_name = "comments.txt";

    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        if (!file_exists($file_name))
        {
            fopen($file_name, "w");
        }

        $file = fopen($file_name, "a");

        fwrite($file, $_POST["name"] . "\n");
        fwrite($file, $_POST["comment"] . "\n");

        fclose($file);
    }

    $comments = array();

    if (file_exists($file_name) && filesize($file_name) > 0)
    {
        $lines = file($file_name, FILE_IGNORE_NEW_LINES);

        for ($i = 0; $i < count($lines); $i = $i + 2)
        {
            $obj = new stdClass();
            $obj->name = $lines[$i];
            $obj->comment = $lines[$i + 1];

            $comments[] = $obj;
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
    <form action="index.php" method="post">
        <table>
            <tr>
                <td><label for="name">Name:</label></td>
                <td><input id="name" required type="text" name="name"></td>
            </tr>
            <tr>
                <td><label for="comment">Comment:</label></td>
                <td><textarea required id="comment" name="comment" cols="30" rows="5"></textarea></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Done"></td>
            </tr>
        </table>
    </form>
    <hr>

    <?php if (count($comments) != 0): ?>

    <div style="display: flex; justify-content: center">
        <table style="border-spacing: 10px; text-align: center">
            <thead>
                <tr>
                    <td><p>Name</p></td>
                    <td><p>Comment</p></td>
                </tr>
            </thead>

            <?php for($i = 0; $i < count($comments); $i++): ?>
            <tr>
                <td><?= $comments[$i]->name; ?></td>
                <td><?= $comments[$i]->comment; ?></td>
            </tr>
            <?php endfor; ?>
        </table>
    </div>

    <?php endif; ?>
</body>
</html>
