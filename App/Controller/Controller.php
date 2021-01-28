<?php


namespace App\Controller;

<<<<<<< HEAD
use App\Game\Game;
=======
>>>>>>> origin/main
use App\Manager\UsersManager;
use Core\Manager;
use http\Env\Request;

class Controller extends Manager
{

    public function signup($user_form)
    {
<<<<<<< HEAD
=======
        $new_user = new UsersManager();
        if(isset($_POST['submit'])) {
            $new_user->add(htmlspecialchars($user_form['login']), password_hash($user_form['password'], PASSWORD_DEFAULT));
        }
>>>>>>> origin/main
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
<<<<<<< HEAD
=======
        $user = new UsersManager();
        if($user->verify_user_login($user_form['login']) == true){
            if($user->verify_user_password($user_form['login'],$user_form['password']) == true){
                var_dump($_SESSION);
                    $_SESSION['login'] = $user_form['login'];
                    header('Location: index.php?view=game');
            }
        }
>>>>>>> origin/main
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
        $game->handleUserInput($userInput);
        $content = $this->getView(__FUNCTION__, ['game' => $game]);
        return $content;
    }

    public function wall_of_fame()
    {
    }
}
