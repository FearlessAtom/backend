<?php
    function get_animal_name($array)
    {
        $syllable_count = mt_rand(2, 4);

        $name = "";

        for ($i = 0; $i < $syllable_count; $i++)
        {
            $name = $name . $array[mt_rand(0, count($array) - 1)];
        }

        $name = ucfirst($name);

        return $name;
    }

    $syllables = array("mi", "ka", "zo", "la", "pu", "ra", "tu", "bi", "lo", "fi", "mo", "sa", "ke", "te", "do", "ni", "ma", "pa", "si", "gu", "he", "re", "vi", "tu", "la");

    $name = get_animal_name($syllables);

    echo $name . "\n";
?>
