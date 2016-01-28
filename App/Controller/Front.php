<?php
namespace App\Controller;

class Front extends \Aqua\Base\Controller
{
    public function index()
    {
        $route = \Aqua\Aqua::$app->getRouter();
        $config = \Aqua\Base\Config\Manager::get('router');
        $params = $route->byUrl($config, \Aqua\Base\Request::getUri());

        $this->run($params['controller'], $params['method']);
        // print_r($connection);
        $this->render('index', [
            'stable'    => 66,
        ]);
    }

}
