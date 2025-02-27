<?php
    function create_user($folder, $user_folders = array(), $password_file_name = "password.txt")
    {
        if (is_dir($folder . $_POST["login"]))
        {
            echo "Such user already exists!";
            return;
        }

        $user_folder = $folder . $_POST["login"] . DIRECTORY_SEPARATOR;

        mkdir($user_folder);

        for ($i = 0; $i < count($user_folders); $i++)
        {
            mkdir($user_folder . $user_folders[$i]);
        }

        $password_file_path = $user_folder . $password_file_name;

        $password_file = fopen($password_file_path, "w");
        fwrite($password_file, $_POST["password"]);
        fclose($password_file);
    }

    function delete_folder($folder)
    {
        if (!is_dir($folder))
        {
            return;
        }

        $files = array_diff(scandir($folder), array('.', '..'));

        foreach ($files as $file)
        {
            $path = $folder . DIRECTORY_SEPARATOR . $file;

            if (is_dir($path))
            {
                delete_folder($path);
            }

            else
            {
                unlink($path);
            }
        }

        rmdir($folder);
    }

    function delete_user($password_file_name = "password.txt")
    {
        $folder = "users/";

        if (!is_dir($folder . $_POST["login"]))
        {
            echo "Invalid credentials!";
            return;
        }

        $user_folder = $folder . $_POST["login"]  . DIRECTORY_SEPARATOR;

        $password_file_path = $user_folder . $password_file_name;

        if (file_get_contents($password_file_path) != $_POST["password"])
        {
            echo "Invalid credentials!";
            return;
        }

        delete_folder($user_folder);
    }
?>
