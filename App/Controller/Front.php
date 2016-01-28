<?php
namespace App\Controller;

class Front extends \Aqua\Base\Controller
{
    public function index()
    {
        $route = \Aqua\Aqua::$app->getRouter();
        $config = \Aqua\Base\Config\Manager::get('router');
        $params = $route->byUrl($config, \Aqua\Base\Request::getUri());

        ob_start();
        $this->run($params['controller'], $params['method'], $params['params']);
        $content = ob_get_contents();
        ob_end_clean();
        // print_r($connection);
        $this->render('index', [
            'content'    => $content,
        ]);
    }

}
