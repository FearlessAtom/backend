<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <?php include("Function/func.php") ?>
    <style>
        td
        {
            text-align: center;
        }
    </style>
</head>
<body>
    <form action="index.php" method="post">
        <table>
            <tr>
                <td>x</td>
                <td>y</td>
                <td></td>
            </tr>
            <tr>
                <td><input type="text" name="x" value="<?php echo (isset($_POST["x"]) ? $_POST["x"] : "")?>"></td>
                <td><input type="text" name="y" value="<?php echo (isset($_POST["y"]) ? $_POST["y"] : "")?>"></td>
                <td><input type="submit" value="Done"></td>
            </tr>
        </table>
    </form>

    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $x = $_POST["x"];
            $y = $_POST["y"];

            include("Function/calculate.php");
        }
    ?>
</body>
</html>
