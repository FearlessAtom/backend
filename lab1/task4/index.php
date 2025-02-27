<?php
    $month = 5;
    echo "Season: " . get_season($month);

    function get_season($month)
    {
        if (in_array($month, range(1, 2)) || $month === 12)
        {
            return "Winter";
        }

        if (in_array($month, range(3, 5)))
        {
            return "Spring";
        }

        if (in_array($month, range(6, 8)))
        {
            return "Summer";
        }

        if (in_array($month, range(9, 11)))
        {
            return "Autumn";
        }

        throw new Exception("Invalid month!");
    }
?>
