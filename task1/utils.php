<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

set_include_path("./");

include_once "db.php";

function find_by_user_id($user_id)
{
    global $pdo;

    $query = $pdo->prepare("select * from users where user_id = :user_id limit 1");

    $query->execute(["user_id" => $user_id]);

    return $query->fetch(PDO::FETCH_OBJ);
}

function find_by_user_name($user_name)
{
    global $pdo;

    $query = $pdo->prepare("select * from users where user_name = :user_name limit 1");

    $query->execute(["user_name" => $user_name]);

    return $query->fetch(PDO::FETCH_OBJ);
}

function find_by_email_address($email_address)
{
    global $pdo;

    $query = $pdo->prepare("select * from users where email_address = :email_address limit 1");

    $query->execute(["email_address" => $email_address]);

    return $query->fetch(PDO::FETCH_OBJ);
}

function create_user($user_name, $email_address, $password)
{
    global $pdo;

    $password_hash = password_hash($password, PASSWORD_BCRYPT);

    $query = $pdo->prepare("insert into users (user_name, email_address, password_hash) values (:user_name, :email_address, :password_hash)");

    return $query->execute(["user_name" => $user_name, "email_address" => $email_address, "password_hash" => $password_hash]);
}

function verify_user($user_name, $password)
{
    $user = find_by_user_name($user_name);

    return password_verify($password, $user->password_hash);
}

function update_user_by_id($user_id, $user_data)
{
    global $pdo;

    $sql = "UPDATE users
            SET user_name = :user_name,
                email_address = :email_address,
                first_name = :first_name,
                last_name = :last_name,
                date_of_birth = :date_of_birth,
                phone_number = :phone_number
            WHERE user_id = :user_id";

    $stmt = $pdo->prepare($sql);

    $stmt->bindParam(':user_name', $user_data['user_name']);
    $stmt->bindParam(':email_address', $user_data['email_address']);
    $stmt->bindParam(':first_name', $user_data['first_name']);
    $stmt->bindParam(':last_name', $user_data['last_name']);
    $stmt->bindParam(':date_of_birth', $user_data['date_of_birth']);
    $stmt->bindParam(':phone_number', $user_data['phone_number']);
    $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);

    return $stmt->execute();
}
