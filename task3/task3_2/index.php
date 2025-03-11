<?php
    function get_unique_words($a, $b)
    {
        $result = array();

        for ($i = 0; $i < count($a); $i++)
        {
            if(!in_array($a[$i], $b))
            {
                $result[] = $a[$i];
            }
        }

        return $result;
    }

    function get_common_words($a, $b)
    {
        $result = array();

        for ($i = 0; $i < count($a); $i++)
        {
            if(in_array($a[$i], $b))
            {
                $result[] = $a[$i];
            }
        }

        return $result;
    }

    function get_frequent_words($a, $b)
    {
        $result = array();

        $count_a = array_count_values($a);
        $count_b = array_count_values($b);

        foreach ($count_a as $word => $count)
        {
            if ($count > 2)
            {
                $result[] = $word;
            }
        }

        foreach ($count_b as $word => $count)
        {
            if ($count > 2)
            {
                $result[] = $word;
            }
        }

        return $result;
    }

    function fplace($file_path, $content)
    {
        $file = fopen($file_path, "w");
        fwrite($file, $content);
        fclose($file);
    }

    if ($argc !== 3) die ("Usage: " . ($argc[0] ?? "index.php") . " <filename_one> <filename_two>" . "\n");

    $file_path_one = $argv[1];
    $file_path_two = $argv[2];

    if (!file_exists($file_path_one)) die ("File " . $file_path_one . " does not exist!" . "\n");
    if (!file_exists($file_path_two)) die ("File " . $file_path_two. " does not exist!" . "\n");

    $words_file_one = explode(" ", str_replace(["\r", "\n"], " ", file_get_contents($file_path_one)));
    $words_file_two = explode(" ", str_replace(["\r", "\n"], " ", file_get_contents($file_path_two)));

    $unique_words = get_unique_words($words_file_one, $words_file_two);
    fplace("unique_words.txt", implode(" ", $unique_words));

    $common_words = get_common_words($words_file_one, $words_file_two);
    fplace("common_words.txt", implode(" ", $common_words));

    $frequent_words = get_frequent_words($words_file_one, $words_file_two);
    fplace("frequent_words.txt", implode(" ", $frequent_words));
?>
