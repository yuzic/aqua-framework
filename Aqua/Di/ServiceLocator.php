<?php
/**
 * Created by PhpStorm.
 * User: itcoder
 * Date: 14.10.15
 * Time: 15:04
 */

namespace Base\App;

class ServiceLocator
{
    public $container = null;
    
    public function __construct(\Base\App\Container $container)
    {

    }

    public function get()
    {
    }
}