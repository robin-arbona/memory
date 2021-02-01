<?php


namespace App\Controller;

use App\Game\Game;
use App\Game\WallOfFame;
use App\Manager\UsersManager;
use App\Manager\ScoresManager;
use Core\Manager;

class Controller extends Manager
{

    public function signup($user_form)
    {
        $new_user = new UsersManager();
        if (isset($_POST['submit'])) {
            $new_user->add(htmlspecialchars($user_form['login']), password_hash($user_form['password'], PASSWORD_DEFAULT));
            header('Location: index.php?view=login');
        }
    }

    public function getView($view, $data = [])
    {
        ob_start();
        extract($data);
        require "view/{$view}.php";
        $content = ob_get_clean();
        return $content;
    }

    public function login($user_form)
    {
        $user = new UsersManager();
        if ($user->verify_user_login($user_form['login']) == true) {
            if ($user->verify_user_password($user_form['login'], $user_form['password']) == true) {
                $_SESSION['login'] = $user_form['login'];
                header('Location: index.php?view=game');
            }
        }
    }

    public function menu()
    {
    }

    public function game($userInput)
    {
        if (isset($_SESSION['id'])) {
            if (!isset($_SESSION['game'])) {
                $game = new Game();
            } else {
                $game = unserialize($_SESSION['game']);
            }
        } else {
            header('Location: index.php?view=login');
        }
        $game->handleUserInput($userInput);
        $_SESSION['game'] = serialize($game);
        $content = $this->getView(__FUNCTION__, ['game' => $game]);
        return $content;
    }

    public function wall_of_fame()
    {
        $wall = new WallOfFame();
        $scores = new UsersManager();
        $content = $this->getView(__FUNCTION__, ['wall' => $wall, 'scores' => $scores]);
        return $content;
    }
}
