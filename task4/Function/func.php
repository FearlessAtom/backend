<?php
    function power($number, $exponent)
    {
        $result = 1;

        for ($i = 0; $i < $exponent; $i++)
        {
            $result = $result * $number;
        }

        return $result;
    }

    function cosine($x, $terms = 20)
    {
        $sum = 0;

        for ($n = 0; $n < $terms; $n++)
        {
            $sign = ($n % 2 == 0) ? 1 : -1;
            $sum += $sign * pow($x, 2 * $n) / factorial(2 * $n);
        }

        return $sum;
    }

    function sine($x, $terms = 20)
    {
        $sum = 0;

        for ($n = 0; $n < $terms; $n++)
        {
            $sign = ($n % 2 == 0) ? 1 : -1;
            $sum += $sign * pow($x, 2 * $n + 1) / factorial(2 * $n + 1);
        }

        return $sum;
    }

    function tangent($number)
    {
        return tan($number);
    }

    function my_tangent($angle)
    {
        $sine_value = sine($angle);
        $cosine_value = cosine($angle);

        if ($cosine_value == 0)
        {
            throw new Exception("Cannot divide by zero!");
        }

        return $sine_value / $cosine_value;
    }
    
    function factorial($number)
    {
        if($number === 0 || $number === 1)
        {
            return 1;
        }

        return $number * factorial($number - 1);
    }
?>
