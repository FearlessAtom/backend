<?php

spl_autoload_register(function ($class)
{
    include_once "./Classes/" . $class . ".php";
});

$Programmer = new Programmer(183, 80, 18);

$Programmer->AddProgrammingLanguage("C#");
$Programmer->AddProgrammingLanguage("JavaScript");
$Programmer->AddProgrammingLanguage("Python");
$Programmer->AddProgrammingLanguage("PHP");

$Programmer->HaveBirth();

$Programmer->CleanRoom();

$Student = new Student(180, 74, 19);

$Student->SetEstablishmentName("ZTU");
$Student->SetCourse(2);

$Student->HaveBirth();

$Student->CleanKitchen();
