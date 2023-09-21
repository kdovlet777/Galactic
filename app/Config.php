<?php

namespace App;

class Config
{
    private static $data;

    public static function get($args, $default = null)
    {
        if (self::$data === null) {
            require_once 'configs/config.php';
            self::$data = $config;
        }

        return (self::$data[$args] ?? $default);
    }
}