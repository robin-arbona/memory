<?php


namespace App\Game;


class Game
{
    public $shot;
    public $gameState = 'init';
    public $cardGame = [];
    public $playHistory = [];

    public function __construct()
    {
    }

    /**
     * Interface for handeling user input form
     */
    public function handleUserInput($userInput)
    {
        var_dump($userInput);
        if ($userInput == null) {
            return;
        }
        if (isset($userInput['new'])) {
            $pairs = (int) str_replace('xpairs to find', '', $userInput['new']);
            $this->new($pairs);
        }
        if (isset($userInput['reset'])) {
            $this->reset();
        }
        if (isset($userInput['card'])) {
            $this->play($userInput['card']);
        }
    }

    /**
     * Initialize a new game
     */
    private function new($pairs)
    {
        $this->reset();
        $this->deal($pairs);
        $this->gameState = 'running';
    }

    /**
     * Deal card to user
     */
    public function deal($pairs)
    {
        $cards = 'ABCDEFGHIJKL';
        $cardGame = [];
        for ($j = 0; $j <= 1; $j++) {
            for ($i = 0; $i <= $pairs - 1; $i++) {
                $cardGame[] = $cards[($i)];
            }
        }

        //Mixed cardsGame
        for ($i = 0; $i <= 2 * $pairs; $i++) {
            $randNumber = rand(0, count($cardGame) - 1);
            $tmp = $cardGame[$randNumber];
            array_splice($cardGame, $randNumber, 1);
            $cardGame[] = $tmp;
        }
        $this->cardGame = $cardGame;
    }

    /**
     * Game logical, runned each time users make entry
     */
    public function play($card)
    {
        $this->playHistory[] = $card;
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
        $this->gameState = 'init';
        $this->cardGame = [];
        $this->playHistory = [];
    }

    /**
     * Return html code to display game Board
     */
    public function displayBoard()
    {
        if ($this->gameState != 'running') {
            return;
        }
        $html = '<form class="border" method="POST" action="index.php?view=game">';

        for ($i = 0; $i < count($this->cardGame); $i++) {
            $card = $this->cardGame[$i];
            $position = $i;
            $html .= "<button class='card' type='submit' name ='card' value='$position-$card' >
                       $card
                    </button>";
        }

        $html .= '</form>';
        return $html;
    }

    /**
     * Return html code to display menu
     */
    public function displayMenu()
    {
        $html = '<form class="border" method="POST" action="index.php?view=game">';
        if ($this->gameState == 'init') {
            $html .= 'New game, choose your level: <br/>';
            for ($pairs = 3; $pairs <= 12; $pairs++) {
                $html .= "<input class='btn btn-primary m-1' type='submit' name='new' value='{$pairs}xpairs to find'>";
            }
        } else {
            $html .= "<input class='btn btn-danger m-1' type='submit' name='reset' value='Reset'>";
        }
        $html .= '</form>';
        return $html;
    }
}
