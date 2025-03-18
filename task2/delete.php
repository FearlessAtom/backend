<?php

require_once "utils.php";

$product_id = $_POST["product-id"];

if (isset($product_id))
{
    remove_product($product_id);
}

header("Location: index.php");
