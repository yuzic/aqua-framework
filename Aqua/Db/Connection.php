<?php
namespace Aqua\Db;

class Connection
{
    protected static $_instance = null;

    public static function instance ()
    {
        if (self::$_instance) {
            return self::$_instance;
        }

        $config = \Aqua\Base\Config\Manager::get('db');

        extract ($config);
        $connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
        try {
            self::$_instance = \pg_connect ($connection_string);
        }
        catch (\Exception $e) {
            die ("BD connect error!: " . $e->getMessage() . "<br/>");
        }

        return self::instance ();
    }

    public static function query ($query)
    {
        try {
            $result = \pg_query (self::instance (),$query) ;

            if (!$result){
                \Base\Debug::vardump(debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1));
            }

        }
        catch (\Exception $e) {
            throw new \Exception ("not executed: " . $query->translate ());
        }

        $error = \pg_result_error_field($result, PGSQL_DIAG_SQLSTATE);
        if ($error) {

            $q_text = $query->translate ();
            $error = "NOT EXECUTED: $q_text ;WITH ERROR: $error";
            throw new \Exception ($error);
        }

        return new Result ($result);
    }
}
