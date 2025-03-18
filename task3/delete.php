<?php

require_once "utils.php";

$employee_id = $_POST["employee-id"];

if (!isset($employee_id))
{
    remove_employee($employee_id);
}

header("Location: index.php");

?>
