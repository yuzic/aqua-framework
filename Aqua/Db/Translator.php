<?php
namespace Aqua\Db;

class Translator
{
    const SQL_QUOTE = "'";
    const SQL_ESCAPE = '"';

    /**
     *
     * @param mixed $value
     * @return string
     */
    public static function quote ($value)
    {

        if (is_null ($value)) {
            return 'NULL';
        }
        if(is_string ($value)) {
            return self::SQL_QUOTE . \pg_escape_string ($value) . self::SQL_QUOTE;
        }
        if (is_numeric ($value) || is_float ($value)) {
            return \pg_escape_string ($value);
        }
        if (is_string ($value)) {
            return self::SQL_QUOTE . \pg_escape_string ($value) . self::SQL_QUOTE;
        }

        return '';

    }
}