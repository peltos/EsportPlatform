<!-- Games Filter Menu Navigation -->
<div class="filterBar-container gameType-container">
    <div class="filterBar--inner">
        <div class="dateFilter gameFilter">
            <a title="League of Legends" class="dateFilter--item gameType <?php if($active == (URL . 'matches/lol')) {echo 'active';} ?>"
               href="<?php echo URL; ?>matches/lol"><img class="img-hover" src="https://img.abiosgaming.com/games/round-lol-logo.png"></a>
            <a title="Dota 2" class="dateFilter--item gameType <?php if($active == (URL . 'matches/dota2')) {echo 'active';} ?>"
               href="<?php echo URL; ?>matches/dota2"><img class="img-hover" src="https://img.abiosgaming.com/games/round-dota-logo.png"></a>
            <a title="Overwatch" class="dateFilter--item gameType <?php if($active == (URL . 'matches/ow')) {echo 'active';} ?>"
               href="<?php echo URL; ?>matches/ow"><img class="img-hover" src="https://img.abiosgaming.com/games/flat-overwatch-logo-round.png"></a>
        </div>
    </div>
</div>
