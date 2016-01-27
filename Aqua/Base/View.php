<?php
namespace Aqua\Base;

class View
{
    public function render($path, array $params)
    {
        extract($params);
        require_once $path;
    }
}