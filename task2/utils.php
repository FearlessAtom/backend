<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

require_once "db.php";

function get_products()
{
    global $pdo;

    $query = $pdo->query("select * from tov");

    return $query->fetchAll(PDO::FETCH_OBJ);
}

function add_product($name, $cost, $quantity, $note)
{
    global $pdo;

    $prepare = $pdo->prepare("insert into tov (name, cost, quantity, note) values (:name, :cost, :quantity, :note)");

    $prepare->execute([
        "name" => $name,
        "cost" => $cost, 
        "quantity" => $quantity, 
        "note" => $note,
    ]);
}

function remove_product($product_id)
{
    global $pdo;

    $prepare = $pdo->prepare("delete from tov where tov_id = :product_id");
    
    $prepare->execute(["product_id" => $product_id]);
}
