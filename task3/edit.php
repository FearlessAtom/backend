<?php

require_once "utils.php";

$employee_id = $_POST["employee-id"];

if (!isset($employee_id))
{
    header("Location: index.php");
}

$name = $_POST["name"];
$position = $_POST["position"];
$salary = $_POST["salary"];

echo $name;

if (isset($name) && isset($position) && isset($salary))
{
    update_employee($employee_id, $name, $position, $salary);
    header("Location: index.php");
}

$user = get_employee($employee_id);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
<style>
    body
    {
        background-color: white;
    }
    form *
    {
        margin-bottom: 5px;
        display: block;
    }
</style>
</head>
<body>
    <form method="post">
        <input style="display: none" readonly type="text" name="employee-id" value="<?=$employee_id?>">
        <input type="text" name="name" placeholder="Name" value="<?=$user->name?>">
        <input type="text" name="position" placeholder="Position" value="<?=$user->position?>">
        <input type="number" name="salary" min="0" step="0.01" placeholder="Salary" value="<?=$user->salary?>">
        <input type="submit" value="Save">
    </form>
</body>
</html>
