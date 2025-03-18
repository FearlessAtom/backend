<?php

require_once "db.php";
require_once "utils.php";

$products = get_products();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <td><h2>Id</h2></td>
                <td><h2>Name</h2></td>
                <td><h2>Cost</h2></td>
                <td><h2>Quantity</h2></td>
                <td><h2>Note</h2></td>
            </tr>
        </thead>

        <?php for($i = 0; $i < count($products); $i++): ?>

        <tr>
            <td><?=$products[$i]->tov_id?></td>
            <td><?=$products[$i]->name?></td>
            <td><?=$products[$i]->cost?></td>
            <td><?=$products[$i]->quantity?></td>
            <td><?=$products[$i]->note?></td>
        </tr>

        <?php endfor; ?>
    </table>   

    <form action="insert.php">
        <input type="submit" value="Add Record" style="margin-top: 5px">
    </form>

    <form action="delete.php" method="post" style="margin-top: 5px">
        <input type="submit" value="Delete record">
        <input name="product-id" required type="number" min="1">
    </form>
</body>
</html>
