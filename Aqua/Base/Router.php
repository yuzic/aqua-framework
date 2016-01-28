<?php
namespace Aqua\Base;

use Aqua\Aqua;


class Router
{
    protected $config = [
        'controller'=> null,
        'method'    => null,
        'action'    => null,
        'pattern'   => null,
        'params'    => []
    ];


    function byUrl($config = null, $url = null)
    {
        $cfg = $config;
        $parts_uri = explode('/', $url ? $url : Request::uri());
        if (end($parts_uri) == '') {
            unset ($parts_uri [count($parts_uri) - 1]);
        }
        array_shift($parts_uri);
        $count_parts_uri = count($parts_uri);
        if (!$count_parts_uri) {
            $count_parts_uri = 1;
            $parts_uri = [0 => ''];
        }

        $data = array();
        $continue = false;
        $done = false;
        foreach ($cfg as $num => $route) {

            $data = array();
            $parts_route = explode('/', $route ['pattern']);
            if (count($parts_route) != $count_parts_uri) {
                continue;
            }

            $cmbnd = array_combine($parts_route, $parts_uri);
            $continue = false;
            foreach ($cmbnd as $key => $value) {
                if (strlen($key) && $key [0] == ':') {
                    $key = substr($key, 1);
                    $data [$key] = $value;
                    continue;
                }
                if ($key != $value) {
                    $continue = true;
                    break;
                }
            }

            if ($continue) {
                continue;
            }
            $done = true;
            break;
        }

        if ($done) {
            $params = isset ($route ['params']) ? array_merge($data, $route ['params']) : $data;
            $route ['params'] = $params;
            list($controller, $method)   = explode('/', $route ['action']);
            $route ['controller'] = $controller;
            $route ['method'] = $method;

            return array_merge ($this->config, $route);;
        }

        return null;
    }

}
