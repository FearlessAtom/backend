<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    </style>
    <?php
        function generate_table($rows, $columns)
        {
            echo "<table style=\"border-collapse: collapse\">";
            
            for ($i = 0; $i < $rows; $i++)
            {
                echo "<tr>";

                for ($j = 0; $j < $columns; $j++)
                {
                    echo "<td style=\"height: 100px; width: 100px; border: 1px solid black;
                        background-color: rgb(" . mt_rand(0, 255) . "," . mt_rand(0, 255) . "," . mt_rand(0, 255) . ")\"></td>";
                }

                echo "</tr>";
            }

            echo "</table>";
        }
    ?>
</head>
<body>
    <?php generate_table(5, 5); ?>
</body>
</html>
