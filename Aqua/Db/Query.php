<?php
namespace Aqua\Db;

class Query
{

    public function instances($sql, array $params)
    {
        return $this->bind($sql, $params);
    }


    protected function bind($sql, array $params)
    {
        foreach ($params as $key => $value) {
            $pattern = '?' . $key;
            $value = \Aqua\Db\Translator::quote($value);
            $sql = str_replace($pattern, $value, $sql);
        }

        return $sql;

    }
}
