<?php

class File
{
    public static string $directory = "./text/";

    public static function Write(string $file_name, string $content): bool
    {
        $file_path = self::$directory . $file_name;

        if (!file_exists($file_path))
        {
            throw new Exception("File " . $file_path . " does not exist!");
        }

        $file = fopen($file_path, "a");

        if(!fwrite($file, $content))
        {
           return false;
        }

        fclose($file);

        return true;
    }

    public static function Read(string $file_name): string
    {
        $file_path = self::$directory . $file_name;

        if (!file_exists($file_path))
        {
            throw new Exception("File " . $file_path . " does not exist!");
        }

        $file_size = filesize($file_path);

        if ($file_size == 0)
        {
            return "";
        }

        $file = fopen($file_path, "r");
        $content = fread($file, filesize($file_path));

        fclose($file);

        return $content;
    }

    public static function Erase(string $file_name): bool
    {
        $file_path = self::$directory . $file_name;

        if (!file_exists($file_name))
        {
            if (!file_exists($file_path))
            {
                throw new Exception("File " . $file_path . " does not exist!");
            }
        }

        if(!$file = fopen($file_path, "w"))
        {
            return false;
        }

        fclose($file);
        return true;
    }
}
