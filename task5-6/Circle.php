<?php

class Circle
{
    private float $X;
    private float $Y;
    private float $Radius;

    function __construct(float $X, float $Y, float $Radius)
    {
        $this->SetX($X);
        $this->SetY($Y);
        $this->SetRadius($Radius);
    }

    function Intersects(Circle $Circle): bool
    {
        $Distance = sqrt(pow($Circle->GetX() - $this->GetX(), 2) + pow($Circle->GetY() - $this->GetY(), 2));

        return $Distance <= sqrt($this->Radius) + sqrt($Circle->GetRadius());
    }

    function __toString(): string
    {
        return "A circle at ({$this->X}, {$this->Y}) with radius of {$this->Radius}";
    }

    public function GetX(): float
    {
        return $this->X;
    }

    public function SetX(float $value): void
    {
        $this->X = $value;
    }

    public function GetY(): float
    {
        return $this->Y;
    }

    public function SetY(float $value): void
    {
        $this->Y = $value;
    }

    public function GetRadius(): float
    {
        return $this->Radius;
    }

    public function SetRadius(float $value): void
    {
        $this->Radius = abs($value);
    }
}
