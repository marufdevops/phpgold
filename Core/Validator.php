<?php

namespace Core;

class Validator
{
    public static function isEmpty($value): bool
    {
        return empty(trim($value));
    }

    public static function isTooLong($value, $length): bool
    {
        return strlen($value) > $length;
    }
}