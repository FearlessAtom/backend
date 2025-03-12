<?php

include_once "./File.php";

echo File::Read("text1.txt");

File::Write("text2.txt", "Some message");
echo File::Read("text2.txt") . "\n";

File::Erase("text2.txt");
echo File::Read("text2.txt") . "\n";

File::Write("text3.txt", "Alya");
echo File::Read("text3.txt") . "\n";
