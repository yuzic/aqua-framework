<?php
namespace Aqua\Base;

use Aqua\Aqua;

Class Route
{
    protected $_controller = null;
    protected $_action = null;
    protected $_params = null;

    /**
     * Parse rote url
     */
    public function parse()
    {
        $request = \Aqua\Base\Request::getRequestUri();
        $splits = explode('/', trim($request,'/'));
        $this->_controller =!empty($splits[0]) ? ucfirst($splits[0])  : 'Index';
        $this->_action = !empty($splits[1]) ? $splits[1] : 'index';
        if(!empty($splits[2])) {
            $keys = $values = [];
            for($i=2, $cnt = count($splits); $i < $cnt; $i++){
                if($i % 2 == 0) {
                    $keys[] = $splits[$i];
                } else {
                    $values[] = $splits[$i];}
            }
            $this->_params = array_combine($keys, $values);
        }
    }

    public function getAction()
    {
        return $this->_action;
    }

    public function getController()
    {
        return $this->_controller;
    }


    public function getParams()
    {
        return $this->_params;
    }
}