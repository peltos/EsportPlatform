<!-- Games Filter Menu Navigation -->
<div class="filterBar-container gameType-container">
    <div class="filterBar--inner">
        <div class="dateFilter gameFilter">
            <a title="League of Legends" class="dateFilter--item gameType <?php if($active == (URL . 'matches/lolscore')) {echo 'active';} ?>"
               href="<?php echo URL; ?>matches/lolscore"><img class="img-hover" src="https://img.abiosgaming.com/games/round-lol-logo.png"></a>
            <a title="Dota 2" class="dateFilter--item gameType <?php if($active == (URL . 'matches/dota2score')) {echo 'active';} ?>"
               href="<?php echo URL; ?>matches/dota2score"><img class="img-hover" src="https://img.abiosgaming.com/games/round-dota-logo.png"></a>
            <a title="Overwatch" class="dateFilter--item gameType <?php if($active == (URL . 'matches/owscore')) {echo 'active';} ?>"
               href="<?php echo URL; ?>matches/owscore"><img class="img-hover" src="https://img.abiosgaming.com/games/flat-overwatch-logo-round.png"></a>
        </div>
    </div>
</div>
