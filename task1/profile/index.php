<?php
    include_once "../utils.php";

    session_start();

    $user_id = $_SESSION["user-id"];

    if (!isset($user_id) || $user_id === "")
    {
        header("Location: /task1/login");
        exit;
    }

    $user = find_by_user_id($user_id);

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $new_user = [
            'user_name' => $_POST['user-name'] ?? '',
            'email_address' => $_POST['email-address'] ?? '',
            'first_name' => $_POST['first-name'] ?? '',
            'last_name' => $_POST['last-name'] ?? '',
            'date_of_birth' => !empty($_POST['date-of-birth']) ? $_POST['date-of-birth'] : null,
            'phone_number' => $_POST['phone-number'] ?? ''
        ];
        
        update_user_by_id($user_id, $new_user);

        header("Location: /task1/profile");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post">
        <div>
            <input readonly type="text" name="user-name" value="<?=$user->user_name ?? ""?>" placeholder="Username">
        </div>

        <div>
            <input type="text" name="email-address" value="<?=$user->email_address?? ""?>" placeholder="Email Address">
        </div>

        <div>
            <input type="text" name="first-name" value="<?=$user->first_name ?? ""?>" placeholder="First Name">
        </div>

        <div>
            <input type="text" name="last-name" value="<?=$user->last_name ?? ""?>" placeholder="Last Name">
        </div>

        <div>
            <input type="datetime" name="date-of-birth" value="<?=$user->date_of_birth ?? ""?>" placeholder="Date of Birth">
        </div>

        <div>
            <input type="tel" name="phone-number" value="<?=$user->phone_number ?? ""?>" placeholder="Phone Number">
        </div>

        <input type="submit" value="Save">
    </form>

    <form action="../logout.php" method="post">
        <input type="submit" value="Logout">
    </form>
</body>
</html>
