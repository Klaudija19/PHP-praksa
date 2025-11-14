<?php

class Validator
{
    public function string($value)
    {
        // Отстранува leading/trailing spaces и проверува дали е празно
        return strlen(trim($value)) === 0;
    }

    public function maxLength($value, $max)
    {
        return strlen(trim($value)) > $max;
    }
}

