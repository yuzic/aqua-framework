<?php
namespace Aqua;

use Aqua\Base\Request;

class Aqua
{
    /** @var  \Aqua\Aqua $app */
    static $app = null;

    public function getRootPath()
    {
        return Request::getDocumentRoot();
    }

    public function getView()
    {
        return new \Aqua\Base\View();
    }

    public function getRouter()
    {
        return new \Aqua\Base\Router();
    }

    public function init()
    {
        self::$app = new self;
    }



}
