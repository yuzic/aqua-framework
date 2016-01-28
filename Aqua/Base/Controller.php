<?php
namespace Aqua\Base;

use Aqua\Aqua;

abstract class  Controller
{
    protected $_view = null;


    /**
     * Get path controller
     *
     * @return string
     */
    public function getPath()
    {
        $reflector = new \ReflectionClass(get_class($this));

        return $reflector->getShortName();
    }


    public function getView()
    {
        if ($this->_view === null) {
            $this->_view = Aqua::$app->getView();
        }
        return $this->_view;
    }

    public function render($view, $params = [])
    {
        return $this->getView()->render($this->getPathView($view), $params);
    }

    public function getPathView($view)
    {
        return  'App/View/Controller/' . $this->getPath() . '/' . $view . '.php';
    }


    public function run($controller, $action, $params  = [])
    {
        $fileController  =  '\\App\Controller\\' . $controller;

        if (!class_exists($fileController)) {
            return false;
        }

        $controller  = new $fileController;

        call_user_func_array([$controller, $action], $params);

        return true;
    }

}
