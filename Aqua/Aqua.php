<?php
namespace Aqua;

class Aqua
{
    /** @var  \Aqua\Aqua $app */
    static $app = null;

    public static function getRootPath()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public static function getView()
    {
        return new \Aqua\Base\View();
    }

    public static function init()
    {
        self::$app = new self;
    }

}