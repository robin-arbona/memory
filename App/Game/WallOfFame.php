<?php


namespace App\Game;


class WallOfFame
{

    /**
     * Affiche un tableau avec les 10 meilleur players
     */
    public function displayWall(array $array)
    {
        $html = "<table><tr><th>Login</th><th>Point</th><th>Shot</th></tr><tr>";
        
        foreach($array as $key)
        {
            $html .= "<td>".$key['login']."</td><td>".$key['points']."</td><td>".$key['shot']."</td></tr>";
            
            
        }
       
        $html .= '</table>';
        return $html;
        
    }
}