<?php


namespace App\Controller;

use App\Game\Game;
use App\Manager\UsersManager;
use Core\Manager;

class Controller extends Manager
{

    public function signup()
    {
    }

    public function getView($view, $data = [])
    {
        ob_start();
        extract($data);
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

    public function game($userInput)
    {
        if (!isset($_SESSION['game'])) {
            $game = new Game();
        } else {
            $game = $_SESSION['game'];
        }
        $content = $this->getView(__FUNCTION__, ['game' => $game]);
        return $content;
    }

    public function wall_of_fame()
    {
    }
}
