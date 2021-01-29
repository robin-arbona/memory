<?php


namespace App\Game;


class WallOfFame
{

    /**
     * list all scores from player
     */
    public function countScores(array $array)
    {
        $scores = [];
        foreach($array as $key => $value)
        {
            echo '<pre>';
            var_dump($value);
            echo '</pre>';
            $scores = implode($value);

        }
        
        
        var_dump($scores);
        

    }


    /**
     * Affiche un tableau avec les 10 meilleur players
     */
    public function displayWall(array $array)
    {
        $html = "<table><tr>";
        foreach($array as $key)
        {
            $html .= "<th>$key</th></tr>";
        }
        
        $html .= '</table>';
        return $html;
        
    }
}