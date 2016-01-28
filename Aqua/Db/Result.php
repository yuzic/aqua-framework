<?php
namespace Aqua\Db;

class Result {
    protected $_result;

    function __construct ($result)
    {
        $this->_result = $result;
    }

    public static function instance ($result)
    {
        return new self ($result);
    }

    /**
     * return how  associative array
     *
     * @return array
     */
    public function asArray ()
    {
        return \pg_fetch_all($this->_result);
    }

}