<?php
namespace Aqua\Base;

class Request
{
    /**
     * Get parametrs form get
     *
     * @param $name
     * @param bool|false $default
     * @return mixed
     */
    public static function get ($name, $default = false)
    {
        return isset ($_GET [$name]) ? $_GET [$name] : $default;
    }

    /**
     * Get parametrs form get
     *
     * @param $name
     * @param bool|false $default
     * @return mixed
     */
    public static function post ($name, $default = false)
    {
        return isset ($_POST [$name]) ? $_POST [$name] : $default;
    }

    public static function isPost()
    {
        return empty($_POST);
    }

    public static function getDocumentRoot()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }

    public static function getUseAgent()
    {
       return  $_SERVER['HTTP_USER_AGENT'];
    }


    public static function getUri()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public static function getIp()
    {
        return $_SERVER['REMOTE_ADDR'];
    }
}
