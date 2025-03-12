<?php

include_once "./Interfaces/IHouseCleaning.php";

class Programmer extends Human
{
    private array $ProgrammingLanguages = array();
    private int $ExperienceYears = 0;

    /*
     * @param string[] $ProgrammingLanguages
     * @param int $ExperienceYears
    */
    function __construct(int $Height, int $Weight, int $Age, array $ProgrammingLanguages = array(), int $ExperienceYears = 0)
    {
        parent::__construct($Height, $Weight, $Age);

        $this->ProgrammingLanguages = $ProgrammingLanguages;
        $this->ExperienceYears = $ExperienceYears;
    }

    public function CleanRoom(): void
    {
        echo "Student is cleaning his room!" . "\n";
    }

    public function CleanKitchen(): void
    {
        echo "Student is cleaning the kitchen!" . "\n";
    }

    function HaveBirth(): void
    {
        echo "A programmer was born!" . "\n";
    }

    public function AddProgrammingLanguage(string $ProgrammingLanguage): void
    {
        $this->ProgrammingLanguages = array_merge($this->ProgrammingLanguages, array($ProgrammingLanguage));
    }

    public function GetProgrammingLanguages(): array
    {
        return $this->ProgrammingLanguages;
    }

    /*
     * @param array $ProgrammingLanguages
    */
    public function SetProgrammingLanguages(array $ProgrammingLanguages): void
    {
        $this->ProgrammingLanguages = $ProgrammingLanguages;
    }

    public function GetExperienceYears(): int
    {
        return $this->GetExperienceYears;
    }

    public function SetExperienceYears(int $ExperienceYears): void
    {
        $this->ExperienceYears = $ExperienceYears;
    }
}
