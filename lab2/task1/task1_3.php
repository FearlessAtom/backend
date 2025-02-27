<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="task1_3.php" method="post">
        <input type="text" name="path" value="<?= $_POST["path"] ?>"/>

        <h1 style="margin: 0">
            <?php
                if ($_POST["path"])
                {
                    $path = $_POST["path"];

                    $slash = 0;

                    for ($i = strlen($path) - 1; $i > 0; $i--)
                    {
                        if ($path[$i] == "/" || $path[$i] == "\\")
                        {
                            $slash = $i + 1;
                            break;
                        }
                    }

                    $dot = strlen($path);

                    for ($i = 0; $i < strlen($path) - 1; $i++)
                    {
                        if ($path[$i] == ".")
                        {
                            $dot = $i;
                            break;
                        }
                    }

                    echo substr($path, $slash, $dot - $slash);
                }
            ?>
        </h1>

        <input type="submit" value="Done">
    </form>
</body>
</html>
