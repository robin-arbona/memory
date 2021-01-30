<?php

$data = $scores->getScore()

?>
<h1>Wall of Fame </h1>
<div class='container'>
   
    <pre>
    <?=$wall->displayWall($data)?>
    </pre>

</div>

