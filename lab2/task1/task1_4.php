<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <form action="task1_4.php" method="post">
        <input value="<?= $_POST["start-date"] ?>" name="start-date" type="text">
        <input value="<?= $_POST["end-date"] ?>" name="end-date" type="text">
        
        <h1 style="margin: 0">
            <?php
                if (isset($_POST["start-date"]) && isset($_POST["end-date"]))
                {
                    try
                    {
                        $start_date = $_POST["start-date"];
                        $end_date = $_POST["end-date"];

                        $date_time_start = DateTime::createFromFormat("d-m-Y", $start_date);
                        $date_time_end = DateTime::createFromFormat("d-m-Y", $end_date);

                        if ($date_time_start === false || $date_time_end === false)
                        {
                            throw new Exception("Invalid date format.");
                        }

                        $interval = $date_time_start->diff($date_time_end);

                        $days = $interval->days;

                        echo $date_time_start > $date_time_end ? -$days : $days;
                    }

                    catch (Exception $e)
                    {
                        echo "Invalid input!";
                    }
                }
            ?>
        </h1>
        
        <input type="submit" value="Done">
    </form>
</body>
</html>
