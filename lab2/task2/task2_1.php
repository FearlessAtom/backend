<?php
    function get_repeated_elements($array)
    {
        $array = array_count_values($array);

        $array = array_filter($array, function($count)
        {
            return $count > 1;
        });

        return array_keys($array);
    }

    $array = [1, 2, 3, 1, 4, 2, 5, 1];
    $repeated_elements = get_repeated_elements($array);

    echo "Array: " . implode(" ", $array) . "<br>";
    echo "Repeated elements: " . implode(" ", $repeated_elements) . "\n";
?>
