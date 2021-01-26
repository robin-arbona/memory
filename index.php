<?php
use \App\Manager\LevelsManager;
require 'Core/Autoloader.php';

spl_autoload_register(['\Core\Autoloader','autoload']);
session_start();

if(isset($_GET['view'])) {
    $view = $_GET['view'];
    if ($view == 'login') {
        ob_start();
        require 'view/login.php';
        $content = ob_get_clean();
    } elseif ($view == 'game') {
        ob_start();
        require 'view/game.php';
        $content = ob_get_clean();
    }elseif($view == 'signup'){
        ob_start();
        require 'view/signup.php';
        $content = ob_get_clean();
    }elseif($view == 'wall_of_fame'){
        ob_start();
        require 'view/wall_of_fame.php';
        $content = ob_get_clean();
    }
    else {
        ob_start();
        require 'view/404.php';
        $content = ob_get_clean();
    }
}else{
    ob_start();
    require 'view/menu.php';
    $content = ob_get_clean();
}

require 'view/template/template.php';


