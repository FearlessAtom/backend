<?php
    $min = 100;
    $max = 999;
    
    $random_number = mt_rand($min, $max);
    $string_random_number = (string)$random_number;
    $length = strlen($string_random_number);

    echo "Random number: $string_random_number <br>";

    $digit_sum = 0;

    for ($i = 0; $i < $length; $i++)
    {
        $digit_sum = $digit_sum + $string_random_number[$i];
    }

    echo "Sum or random number's digits: $digit_sum <br>";

    $reversed_random_number = $string_random_number;

    for ($i = 0; $i < $length / 2; $i++)
    {
        $temp = $reversed_random_number[$i];
        $reversed_random_number[$i] = $reversed_random_number[$length - $i - 1];
        $reversed_random_number[$length - $i - 1] = $temp;
    }

    echo "Reversed random number: $reversed_random_number <br>";

    $largest_number = $string_random_number;

    for ($i = 0; $i < $length - 1; $i++)
    {
        $min_index = $i;

        for ($j = $i + 1; $j < $length; $j++)
        {
            if ($largest_number[$j] > $largest_number[$min_index])
            {
                $min_index = $j;
            }
        }

        $temp = $largest_number[$min_index];
        $largest_number[$min_index] = $largest_number[$i];
        $largest_number[$i] = $temp;
    }

    echo "Largest possible number: $largest_number <br>";
?>
