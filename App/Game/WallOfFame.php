<?php


namespace App\Game;


class WallOfFame
{

    /**
     * Affiche un tableau avec les 10 meilleur players
     */
    public function displayWall(array $array)
    {
        $html = "<table class='table table-striped table-dark'><tr><th scope='col'>Ranking</th><th scope='col'>Login</th><th scope='col'>Point</th><th scope='col'>Shot</th></tr><tr>";
        $a = 0;
        foreach($array as $key)
        {
            $a++;
            $html .= "<th scope='row'>$a</th><td>".$key['login']."</td><td>".$key['points']."</td><td>".$key['shot']."</td></tr>";
            
            
        }
       
        $html .= '</table>';
        return $html;
        
    }
}