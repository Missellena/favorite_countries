<?php

/*
* Class for defining the Log
*/

class Log
{
    private static $config;

    public static function get($key, $default = null)
    {
        if (is_null(self::$config)) {
            self::$config = include './config.php';
        }

        return (!empty(self::$config[$key]))?self::$config[$key]:$default;
    }
}