<?php

include_once "./Circle.php";

$a = new Circle(1, 1, 9);
$b = new Circle(5, 4, 4);

echo $a . "\n";
echo $b . "\n";

echo ($a->Intersects($b) ? "True" : "False"). "\n";
