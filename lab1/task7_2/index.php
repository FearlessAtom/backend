<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style> *
        {
            box-sizing: border-box;
        }

        html, body
        {
            height: 100%;
        }


        body
        {
            background-color: black;
            margin: 0;
            padding: 20px;
        }

        .container
        {
            border: 2px dashed white;
            height: 100%;
            position: relative;
        }

        .circle
        {
            position: absolute;
            background-color: red;
        }
    </style>

    <?php
        function generate_circle($size, $top, $left)
        {
            echo "<div class=\"circle\" style=\"width: " . $size . "px; height: " . $size . "px;
                top: " . $top . "px; left: " . $left . "px\"></div>";
        }

        function generate_circles($count)
        {
            for ($i = 0; $i < $count; $i++)
            {
                $random_size = mt_rand(30, 200);

                $random_top = mt_rand(0, 650 - $random_size);
                $random_left = mt_rand(0, 1100);

                generate_circle($random_size, $random_top, $random_left);
            }
        }
    ?>
</head>
<body>
    <div class="container">
        <?php generate_circles(5); ?>   
    </div>
</body>
</html>
