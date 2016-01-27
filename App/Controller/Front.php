<?php
namespace App\Controller;

class Front extends \Aqua\Base\Controller
{
    public function index()
    {
        $route = \Aqua\Aqua::$app->getRoute();
        $route->parse();
        $controller =  $route->getController();
        $action =  $route->getAction();
        $this->run($controller, $action);
        // print_r($connection);
        $this->render('index', [
            'stable'    => 66,
        ]);
    }

}