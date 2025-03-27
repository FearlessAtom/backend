<?php

class UsersController
{
    private PDO $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUserById(string $user_id): mixed
    {
        $prepare = $this->pdo->prepare("select * from users where user_id = :user_id limit 1");

        $prepare->execute(["user_id" => $user_id]);

        return $prepare->fetch(PDO::FETCH_OBJ);
    }
    
    public function getUserByUsername(string $user_name): mixed
    {
        $prepare = $this->pdo->prepare("select * from users where user_name = :user_name limit 1");

        $prepare->execute(["user_name" => $user_name]);

        return $prepare->fetch(PDO::FETCH_OBJ);
    }

    public function getUserByEmailAddress(string $email_address): mixed
    {
        $prepare = $this->pdo->prepare("select * from users where email_address = :email_address limit 1");

        $prepare->execute(["email_address" => $email_address]);

        return $prepare->fetch(PDO::FETCH_OBJ);
    }

    public function processRequest(string $method, ?string $id): void
    {
        if (!is_null($id))
        {
            $this->processResourceRequest($method, $id);
        }

        else
        {
            $this->processCollectionRequest($method);
        }
    }

    public function processResourceRequest(string $method, string $id): void
    {
        switch ($method)
        {
            case "GET":
            {
                echo json_encode($this->getUserById($id));

                break;
            }

            case "PATCH":
            {
                $data = json_decode(file_get_contents("php://input"));

                if (isset($data->user_name))
                {
                    $this->pdo->exec("UPDATE users SET user_name = '{$data->user_name}' WHERE user_id = {$id}");
                }

                if (isset($data->email_address))
                {
                    $this->pdo->exec("UPDATE users SET email_address = '{$data->email_address}' WHERE user_id = {$id}");
                }

                break;
            }

            case "DELETE":
            {
                $user = $this->getUserById($id);

                if (!$user)
                {
                    echo "Invalid credentials!";
                    http_response_code(400);
                    exit;
                }

                $this->pdo->exec("delete from users where user_id = $id");
                http_response_code(204);
                break;
            }
        }
    }

    public function processCollectionRequest(string $method): void
    {
        switch ($method)
        {
            case "GET":
            {
                global $pdo;

                $data = $pdo->query("select * from users");
                $data = $data->fetchAll(PDO::FETCH_ASSOC);

                echo json_encode($data);

                break;
            }

            case "POST":
            {
                $data = json_decode(file_get_contents("php://input"));

                $user_name = $data->user_name;

                if ($this->getUserByUsername($user_name) != null)
                {
                    http_response_code(400);
                    echo "The username is taken!";
                    exit;
                }

                $email_address = $data->email_address;

                if ($this->getUserByEmailAddress($email_address) != null)
                {
                    http_response_code(400);
                    echo "The email address is taken!";
                    exit;
                }

                $password = $data->password;

                if (strlen($password) < 4 || strlen($password) > 32)
                {
                    http_response_code(400);
                    echo "Invalid password length!";
                    exit;
                }

                $password_hash = password_hash($password, PASSWORD_BCRYPT);

                $prepare = $this->pdo->prepare("insert into users (user_name, email_address, password_hash) values (:user_name, :email_address, :password_hash)");

                $prepare->execute(["user_name" => $user_name,
                    "email_address" => $email_address,
                    "password_hash" => $password_hash]);

                echo $prepare->fetch();

                break;
            }

            case "LOGIN":
            {
                $data = json_decode(file_get_contents("php://input"));

                $email_address  = $data->email_address;
                $password = $data->password;

                $user = $this->getUserByEmailAddress($email_address);

                if (!$user)
                {
                    http_response_code(400);
                    echo "Invalid credentials 1!";
                    exit;
                }

                if (!password_verify($password, $user->password_hash))
                {
                    http_response_code(400);
                    echo "Invalid credentials 2!";
                    exit;
                }

                echo $user->user_id;

                break;
            }
        }
    }
}
