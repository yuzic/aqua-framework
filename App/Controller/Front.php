<?php
namespace App\Controller;

class Front extends \Aqua\Base\Controller
{
    public function index()
    {
        $message = ['error'  => null, 'content' => null];

        try {
            $route = \Aqua\Aqua::$app->getRouter();
            $config = \Aqua\Base\Config\Manager::get('router');
            $params = $route->byUrl($config, \Aqua\Base\Request::getUri());

            ob_start();
            $run  = $this->run($params['controller'], $params['method'], $params['params']);
            if (!$run) {
                throw new \Exception('Error find action');
            }
            $message['content'] = ob_get_contents();
            ob_end_clean();
        } catch (\Exception $e) {
            header("HTTP/1.0 404 Not Found");
            $message['error']  =  $e->getMessage();
        }

        $this->render('index', $message);
    }

}
