<?php

include_once "autoload.php";

$Controller = new Controllers\UserController();
$Model = new Models\UserModel();
$View = new Views\UserView();


$Person = $Model->GetModel();
echo $Person->name . "\n";

echo $View->GetView("Title") . "\n";

$Controller->GetController($View, $Model);
