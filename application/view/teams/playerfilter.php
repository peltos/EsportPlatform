<?php
$page = 'players';
$active = '//' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>

<h2> Players </h2>

<!-- Player Filter Menu Navigation -->
<div class="filterBar-container gameType-container">
    <div class="filterBar--inner">
        <div class="dateFilter gameFilter">
            <a title="League of Legends" class="dateFilter--item gameType <?php if($active == (URL . 'players/lol')) {echo 'active';} ?>"
               href="<?php echo URL; ?>players/lol"><img class="img-hover" src="https://img.abiosgaming.com/games/round-lol-logo.png"></a>
            <a title="Dota 2" class="dateFilter--item gameType <?php if($active == (URL . 'players/dota2')) {echo 'active';} ?>"
               href="<?php echo URL; ?>players/dota2"><img class="img-hover" src="https://img.abiosgaming.com/games/round-dota-logo.png"></a>
            <a title="Overwatch" class="dateFilter--item gameType <?php if($active == (URL . 'players/ow')) {echo 'active';} ?>"
               href="<?php echo URL; ?>players/ow"><img class="img-hover" src="https://img.abiosgaming.com/games/flat-overwatch-logo-round.png"></a>
        </div>
    </div>
</div>
