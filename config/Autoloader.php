<?php
/**
 * Created by PhpStorm.
 * User: Lucile Rutkowski
 * Date: 15/06/2018
 * Time: 00:04
 */

namespace App\config;


class Autoloader {

    public static function register()
    {
        spl_autoload_register([__CLASS__, 'autoload']);
    }

    public static function autoload($class)
    {
        $class = str_replace('App', '', $class);
        $class = str_replace('\\', '/', $class);
        require '../'.$class.'.php';
    }

} 