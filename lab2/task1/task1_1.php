<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $text = $_POST["text"];
        $find = $_POST["find"];
        $replace = $_POST["replace"];

        $result = str_replace($find, $replace, $text);
    }

    else
    {
        $text = $find = $replace = $result = "";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        input::placeholder
        {
            color: black;
        }
    </style>
</head>
<body>
    <form action="task1_1.php" method="post">
        <input type="text" placeholder="Text" name="text" value="<?=$text?>"><br>
        <input type="text" placeholder="Find" name="find" value="<?=$find?>"><br>
        <input type="text" placeholder="Replace" name="replace" value="<?=$replace?>"><br>
        <input type="text" placeholder="Result" name="result" value="<?=$result?>"><br>
        <input type="submit" value="Done">
    </form>
</body>
</html>
