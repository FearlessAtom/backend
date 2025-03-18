<?php

require_once "utils.php";

$employees = get_employees();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <table>
        <thead>
            <tr>
                <td><h2>Id</h2></td>
                <td><h2>Name</h2></td>
                <td><h2>Position</h2></td>
                <td><h2>Salary</h2></td>
                <td></td>
            </tr>
        </thead>

        <?php for($i = 0; $i < count($employees); $i++): ?>

        <tr>
            <td><?=$employees[$i]->employee_id?></td>
            <td><?=$employees[$i]->name?></td>
            <td><?=$employees[$i]->position?></td>
            <td>$<?=$employees[$i]->salary?></td>
            <td>
                <form action="edit.php" method="post">
                    <input hidden type="text" name="employee-id" value="<?=$employees[$i]->employee_id?>">
                    <input type="submit" value="Edit">
                </form>
            </td>
        </tr>

        <?php endfor; ?>
    </table>   

    <form action="insert.php" style="margin-top: 5px">
        <input type="submit" value="Add Record">
    </form>

    <form action="delete.php" style="margin-top: 5px" method="post">
        <input type="submit" value="Delete Record">
        <input type="number" min="1" required name="employee-id">
    </form>

    <h2>Average salary: $<?=round(get_average_salary(), 2)?></h2>
</body>
</html>
