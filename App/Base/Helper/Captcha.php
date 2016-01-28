<?php
namespace App\Base\Helper;

class Captcha
{
    protected static  $allowPhrase = [
        'три'
    ];

    public static  function validate($value)
    {
        if (in_array(strtolower($value), self::$allowPhrase)) {
            return true;
        }

        return false;
    }
}