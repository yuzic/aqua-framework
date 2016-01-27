<?php
namespace Aqua\Db;

abstract class Model
{
    /**
     * Get model name
     */
    public static function m()
    {
        return new static;
    }
}