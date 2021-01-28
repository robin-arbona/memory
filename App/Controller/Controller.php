<?php


namespace App\Controller;


use App\Manager\UsersManager;
use Core\Manager;

class Controller extends Manager
{

    public function signup()
    {
    }

    public function getView($view)
    {
        ob_start();
        require "view/{$view}.php";
        $content = ob_get_clean();
        return $content;
    }

    public function login()
    {
    }

    public function menu()
    {
    }

    public function game()
    {

        $content = $this->getView(__FUNCTION__);
        return $content;
    }

    public function wall_of_fame()
    {
    }
}
