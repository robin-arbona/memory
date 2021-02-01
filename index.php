<?php
require 'Core/Autoloader.php';

spl_autoload_register(['\Core\Autoloader', 'autoload']);
$controller = new \App\Controller\Controller();
$user = new \App\Manager\UsersManager();
session_start();

if (isset($_GET['view'])) {
    $view = $_GET['view'];

    if ($view == 'login') {
        $content = $controller->getView($view);
        if (isset($_POST['submit'])) {
            $controller->login($_POST);
        }
    } elseif ($view == 'game') {
        $content = $controller->game($_POST);
    } elseif ($view == 'signup') {
        $controller->signup($_POST);
        $content = $controller->getView($view);
    } elseif ($view == 'wall_of_fame') {
        $content = $controller->wall_of_fame();
    } else {
        $content = $controller->getView('404');
    }
} else {
    $content = $controller->getView('menu');
}

require 'view/template/template.php';
