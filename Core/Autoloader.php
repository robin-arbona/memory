<?php


namespace Core;


class Autoloader
{
    static function autoload($myclass)
    {
        $filepath = $myclass .'.php';
        require $filepath;
    }
}