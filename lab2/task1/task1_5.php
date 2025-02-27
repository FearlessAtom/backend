<?php
    function get_random_character()
    {
        return chr(mt_rand(33, 126));
    }

    function generate_password($length)
    {
        $result = "";
        for ($i = 0; $i < $length; $i++)
        {
            $result = $result . get_random_character();
        }

        return $result;
    }

    function has_lower($string)
    {
        return has_type($string, "ctype_lower");
    }

    function has_upper($string)
    {
        return has_type($string, "ctype_upper");
    }

    function has_digit($string)
    {
        return has_type($string, "ctype_digit");
    }

    function has_punct($string)
    {
        return has_type($string, "ctype_punct");
    }

    function has_type($string, $function)
    {
        for ($i = 0; $i < strlen($string); $i++)
        {
            if ($function($string[$i]))
            {
                return true;
            }
        }

        return false;
    }

    function is_password_strong($password)
    {
        if (strlen($password) < 8)
        {
            return false;
        }

        if (!has_lower($password))
        {
            return false;
        }

        if (!has_upper($password))
        {
            return false;
        }

        if (!has_digit($password))
        {
            return false;
        }

        if (!has_punct($password))
        {
            return false;
        }

        return true;
    }

    $password = generate_password(8);

    echo "password: " . $password . "<br>";

    echo "is_strong: " . (is_password_strong($password) ? "True" : "False");
?>
