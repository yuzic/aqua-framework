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

    public static function getDocumentRoot()
    {
        return $_SERVER['DOCUMENT_ROOT'];
    }


    public static function getRequestUri()
    {
        return $_SERVER['REQUEST_URI'];
    }


    /**
     *
     * @return boolean
     */
    public static function isAjax ()
    {
        return (
            isset ($_SERVER ['HTTP_X_REQUESTED_WITH']) &&
            $_SERVER ['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest'
        );
    }
}