<?php


namespace App\Manager;


class LevelsManager extends \Core\Manager
{
    /**
     * Retourne le niveau selectioné par l'utilisateur
     * @return int
     */
    public function getLevel(array $card) :int
    {
       
        $id_levels = (count($card) / 2 ) - 2;
        
        return $id_levels;
    }

}