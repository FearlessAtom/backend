<?php
    function createArray()
    {
        $length = mt_rand(3, 7);

        $array = array();

        for ($i = 0; $i < $length; $i++)
        {
            array_push($array, mt_rand(10, 20));1
        }

        return $array;
    }

    function mergeArray($one, $two)
    {
        $array = array_merge($one, $two);

        $array = array_unique($array);

        sort($array);

        return $array;
    }

    $one = createArray();

    echo implode(" ", $one) . "<br>";

    $two = createArray();

    echo implode(" ", $two) . "<br>";

    $array = mergeArray($one, $two);

    echo implode(" ", $array) . "\n";
?>
