<?php
/**
 * Created by PhpStorm.
 * User: itcoder
 * Date: 14.10.15
 * Time: 15:04
 */

namespace Aqua\Di;

use Aqua\Di\Container;

class ServiceLocator
{
    public $container = null;
    
    public function __construct(Container $container)
    {

    }

    public function get()
    {
    }
}