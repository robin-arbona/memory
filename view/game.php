<?php
?>
<h1>Game</h1>
<div class='container'>
    <?= $game->displayBoard() ?>
    <?= $game->displayMenu() ?>
    <?php
    echo 'Dashboard ';
    echo '<br/> ReturnedCard: ';
    var_dump($game->returnedCard);
    echo '<br/> Revealed Cards';
    var_dump($game->revealedCards);
    echo '<br/> History';
    var_dump($game->history);
    echo '<br/> Flag loose last shot';
    var_dump($game->looseLastShot);



    ?>
</div>