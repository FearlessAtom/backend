<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="task1_2.php" method="post">
        <input type="text" name="result" value="<?= $_POST["result"] ?>">
        
        <h1 style="margin: 0">
            <?php
                if (isset($_POST["result"]))
                {
                    $array = explode(" ", $_POST["result"]);

                    sort($array);

                    echo implode(" ", $array);
                }
            ?>
        </h1>
        
        <input type="submit" value="Done">
    </form>
</body>
</html>
