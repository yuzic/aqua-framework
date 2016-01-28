<?php
namespace App\Base\Helper;

class Html
{
    public static function escape($value)
    {
        return htmlspecialchars($value);
    }
}