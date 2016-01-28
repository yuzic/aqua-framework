<?php
namespace Aqua\Base\Config;

class Manager
{
    public static function get ($file)
    {
        $path = __DIR__ . '/../../../Config/' . $file .'.php';

        return require_once $path;
    }

}