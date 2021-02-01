<?php


namespace App\Game;

use App\Manager\ScoresManager;
use App\Manager\LevelsManager;


class Game
{
    public $shot;
    public $gameState = 'init';
    public $cardGame = [];
    public $returnedCard = '';
    public $revealedCards = [];
    public $looseLastShot = false;
    public $history = [];
    public $msg = 'New game, choose your level';


    public function __construct()
    {
    }

    /**
     * Interface for handeling user input form
     */
    public function handleUserInput($userInput)
    {
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
        $this->shot = 2 * $pairs + 1;
        $this->gameState = 'running';
        $this->msg = $this->shot . ' shots available';
    }

    /**
     * Deal card to user
     */
    public function deal($pairs)
    {
        $cards = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
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
        $this->shot--;
        if ($this->shot > 0) {
            $this->msg = $this->shot . ' shots still available';
        } else {
            $this->msg = 'No more shots available, if you make a mistake, you\'re finish';
        }

        if ($this->looseLastShot) {
            $card2hide = $this->history[count($this->history) - 1];
            $this->hideCard($card2hide);
            $card2hide = $this->history[count($this->history) - 2];
            $this->hideCard($card2hide);
            $this->looseLastShot = FALSE;
        }

        $this->history[] = $card;
        $this->revealCard($card);


        if ($this->returnedCard == '') {
            $this->returnedCard = $card;
        } else {
            if ($this->arePairs($this->returnedCard, $card)) {
                if ($this->isWinner()) {
                    $level = new LevelsManager;
                    $score = new ScoresManager;
                    
                    $score->add($level->getLevel($this->cardGame),$_SESSION['id']);
                    $this->msg = 'You\'re the best, you win';
                    $this->gameState = 'end';
                }
            } else {
                if ($this->isLooser()) {
                    $this->msg = 'Looser, no more shots..';
                    $this->gameState = 'end';
                }
                $this->looseLastShot = TRUE;
            }
            $this->returnedCard = '';
        }
    }

    /**
     * Register card has card to be revealed in game
     */
    public function revealCard($cards)
    {
        $this->revealedCards[] = $cards;
    }

    /**
     * Delete from array card in order to be hide
     */
    public function hideCard($card)
    {
        $key = array_search($card, $this->revealedCards);
        array_splice($this->revealedCards, $key, 1);
    }
    /**
     * Check if selected cards are pairs
     */
    public function arePairs($lastcard, $currentcard)
    {
        if ($lastcard[-1] == $currentcard[-1]) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Check if user has win is game
     */
    public function isWinner()
    {
        if (count($this->revealedCards) == count($this->cardGame)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Check if user has loose the game
     */
    public function isLooser()
    {
        if ($this->shot <= 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * Reset game parameters
     */
    public function reset()
    {
        $this->gameState = 'init';
        $this->cardGame = [];
        $this->returnedCard = '';
        $this->revealedCards = [];
        $this->looseLastShot = false;
        $this->history = [];
        $this->shot = 0;
        $this->msg = 'New game, choose your level';
    }

    /**
     * Return html code to display game Board
     */
    public function displayBoard()
    {
        $html = '';

        if ($this->msg != '') {
            $html .= "<p>{$this->msg}</p>";
        }
        if ($this->gameState == 'init') {
            return $html;
        }

        $disabled = $this->gameState == 'end' ? 'disabled' : '';
        $html .= '<form class="row justify-content-center" method="POST" action="index.php?view=game">';

        for ($i = 0; $i < count($this->cardGame); $i++) {
            $card = $this->cardGame[$i];
            $id_card = $i . '-' . $card;
            if (in_array($id_card, $this->revealedCards)) {
                $html .= "<button disabled class='card col-1'  name ='card' value='$id_card' ><img class='img_card' src='public/img/card-$card.jpg' alt='Mistery'></button>";
            } else {
                $html .= "<button $disabled class='card col-1' type='submit' name ='card' value='$id_card' ><img class='img_card' src='public/img/card-mistery.jpg' alt='Mistery'></button>";
            }
        }

        $html .= '</form>';
        return $html;
    }

    /**
     * Return html code to display menu
     */
    public function displayMenu()
    {
        $html = '<form class="row justify-content-center" method="POST" action="index.php?view=game">';
        if ($this->gameState == 'init') {
            for ($pairs = 3; $pairs <= 12; $pairs++) {
                $html .= "<input class=' btn btn-primary m-1 w-50' type='submit' name='new' value='{$pairs}xpairs to find'>";
            }
        } else {
            $html .= "<input class=' btn btn-danger m-1 w-50' type='submit' name='reset' value='Reset'>";
        }
        $html .= '</form>';
        return $html;
    }
}
