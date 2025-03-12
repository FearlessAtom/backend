<?php

include_once "./Interfaces/IHouseCleaning.php";

class Student extends Human
{
    private string $EstablishmentName;
    private int $Course;

    function __construct(int $Height, int $Weight, int $Age, string $EstablishmentName = "", int $Course = 1)
    {
        parent::__construct($Height, $Weight, $Age);
        
        $this->SetEstablishmentName($EstablishmentName);
        $this->SetCourse($Course);
    }

    public function CleanRoom(): void
    {
        echo "Student is cleaning his room!" . "\n";
    }

    public function CleanKitchen(): void
    {
        echo "Student is cleaning the kitchen!" . "\n";
    }

    public function HaveBirth(): void
    {
        echo "A student was born!" . "\n";
    }

    public function IncrementCourse(): void
    {
        $this->SetCourse($this->Course + 1);
    }

    public function GetEstablishmentName(): string
    {
        return $this->EstablishmentName;
    }

    public function SetEstablishmentName(string $EstablishmentName): void
    {
        $this->EstablishmentName = $EstablishmentName;
    }

    public function GetCourse(): int
    {
        return $this->Course;
    }

    public function SetCourse(int $Course): void
    {
        $this->Course = $Course;
    }
}
