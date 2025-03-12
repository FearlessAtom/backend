<?php

abstract class Human implements IHouseCleaning
{
    protected int $Height;
    protected int $Weight;
    protected int $Age;

    function __construct(int $Height, int $Weight, int $Age)
    {
        $this->SetHeigth($Height);
        $this->SetWeight($Weight);
        $this->SetAge($Age);
    }

    abstract public function HaveBirth(): void;

    protected function GetHeigth(): int
    {
        return $this->Height;
    }

    public function SetHeigth(int $Height): void
    {
        $this->Height = $Height;
    }

    public function GetWeight(): int
    {
        return $this->Weight;
    }

    public function SetWeight(int $Weight): void
    {
        $this->Weight = $Weight;
    }

    public function GetAge(): int
    {
        return $this->Age;
    }

    public function SetAge(int $Age): void
    {
        $this->Age = $Age;
    }
}
