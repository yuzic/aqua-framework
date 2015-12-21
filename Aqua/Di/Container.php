<?php
/**
 * Created by PhpStorm.
 * User: itcoder
 * Date: 14.10.15
 * Time: 12:40
 */
namespace Base\App;


/**
 * Dependence of injection Container
 * Class Container
 * @package Base\App
 */
class Container
{
    protected $container = [];

    public function __construct()
    {

    }

    public function __set($key, $value)
    {
        $this->container[$key] = $value;
    }

    public function __get($value)
    {
        return $this->container[$value]($this);
    }

}
