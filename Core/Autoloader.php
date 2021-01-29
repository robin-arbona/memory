<?php


namespace Core;


class Autoloader
{
    static function autoload($myclass)
    {
        $filepath = str_replace('\\', '/', $myclass)  . '.php';
        require $filepath;
    }
}
