<?php


namespace App\Game;


class Game
{
    public $shot;
    public $gameState = 'init';

    public function __construct()
    {
    }

    public function handleUserInput($userInput)
    {
        var_dump($userInput);
    }

    /**
     * Initialize a new game
     */
    private function new()
    {
    }

    /**
     * Deal card to user
     */
    public function deal()
    {
    }

    /**
     * Game logical, runned each time users make entry
     */
    public function play()
    {
    }

    /**
     * Check if selected cards are pairs
     */
    public function arePairs()
    {
    }

    /**
     * Check if used has win is game
     */
    public function isWinner()
    {
    }

    /**
     * Reset game parameters
     */
    public function reset()
    {
    }

    /**
     * Return html code to display game Board
     */
    public function displayBoard()
    {
    }

    /**
     * Return html code to display menu
     */
    public function displayMenu()
    {
        $html = '<form method="POST" action="index.php?view=game">';
        if ($this->gameState == 'init') {
            $html .= 'New game, choose your level: <br/>';
            for ($pairs = 3; $pairs <= 12; $pairs++) {
                $html .= "<input class='btn btn-primary m-1' type='submit' name='new-game' value='{$pairs}xpairs to find'>";
            }
        }
        $html .= '</form>';
        return $html;
    }
}
