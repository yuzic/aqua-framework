<?php
namespace Aqua\Base\Config;

class Manager
{
    protected static $_configs = array (

    );

    public static function get ($file)
    {
        $path = __DIR__ . '/../../../Config/' . $file .'.php';
        $index = $path;
        if (isset (self::$_configs [$path])) {
            return self::$_configs [$path] ;
        }

        if (!file_exists ($path)) {
            echo 'error load config';
            return null;
        }
        self::$_configs [$index] =require_once $path;

        return self::$_configs [$index];
    }

}