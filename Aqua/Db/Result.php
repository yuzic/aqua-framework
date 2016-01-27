<?php
namespace Aqua\Db;

class Result {
    protected $_result;
    protected $_scheme;
    protected $_relations = array ();

    function __construct ($result)
    {
        $this->_result = $result;
    }

    public static function instance ($result)
    {
        return new self ($result);
    }

    /**
     * @param bool $limit
     * @param int $offset
     * @return array
     */
    public function asArray ($limit = false, $offset = 0)
    {
        return $this->_render ('\pg_fetch_array', array (), $limit, $offset);
    }

    /**
     * @param callable $render_function_name
     * @param array $render_function_params
     * @param $limit
     * @param $offset
     * @return array
     */
    protected function _render (callable $render_function_name, array $render_function_params, $limit,$offset)
    {
        $result = [];
        if ($offset) {
            \pg_result_seek ($this->_result, $offset);
        }
        array_unshift ($render_function_params,$this->_result);
        $i = 0;
        while ($row = call_user_func_array ($render_function_name, $render_function_params)) {
            if ($limit && $i >= $limit) {
                break;
            }

            $result [] = $row;
            $i++;
        }
        \pg_result_seek ($this->_result, 0);

        return $result;
    }

}