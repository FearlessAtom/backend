<?php

require_once "db.php";

function get_employee($employee_id)
{
    global $pdo;

    $prepare = $pdo->prepare("select * from employees where employee_id = :employee_id limit 1");

    $prepare->execute(["employee_id" => $employee_id]);

    return $prepare->fetch(PDO::FETCH_OBJ);
}

function get_employees()
{
    global $pdo;

    $query = $pdo->query("select * from employees");

    return $query->fetchAll(PDO::FETCH_OBJ);
}

function add_employee($name, $position, $salary)
{
    global $pdo;

    $prepare = $pdo->prepare("insert into employees (name, position, salary) values (:name, :position, :salary)");

    $prepare->execute([
        "name" => $name,
        "position" => $position,
        "salary" => $salary,
    ]);
}

function remove_employee($employee_id)
{
    global $pdo;

    $query = $pdo->prepare("delete from employees where employee_id = :employee_id");

    $query->execute(["employee_id" => $employee_id]);
}

function update_employee($employee_id, $name, $position, $salary)
{
    global $pdo;

    $query = $pdo->prepare("
        UPDATE employees 
        SET name = :name, position = :position, salary = :salary 
        WHERE employee_id = :employee_id
    ");

    $query->execute([
        'name' => $name,
        'position' => $position,
        'salary' => $salary,
        'employee_id' => $employee_id,
    ]);
}

function get_average_salary()
{
    global $pdo;

    $query = $pdo->query("select avg(salary) as average_salary from employees");

    $result = $query->fetch(PDO::FETCH_OBJ);

    return $result->average_salary;
}
