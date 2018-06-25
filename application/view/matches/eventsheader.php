<?php
$page = 'timeline';
$active = '//' . $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
?>
<div class="container timeline-container" data-url="<?php if (!empty($url)) echo $url ?>">

<h1>Matches
  <span class="tooltip"><i class="fas fa-info-circle"></i>
    <span class="tooltiptext">View upcoming matches or check out the score of previous games.</span></span></h1>
<div class="filterBar-container">
    <div class="filterBar--inner">
        <div class="dateFilter">
            <a class="dateFilter--item" href="<?php echo URL; ?>matches"><i class="filter-icon fas fa-filter"></i></a>
            <a class="dateFilter--item <?php if($active == (URL . 'matches') ||
                                                $active == (URL . 'matches/lol') ||
                                                $active == (URL . 'matches/dota2') ||
                                                $active == (URL . 'matches/ow')) {echo 'active';} ?>"
                                                href="<?php echo URL; ?>matches" id="upcoming">upcoming</a>
            <a class="dateFilter--item <?php if($active == (URL . 'matches/running')) {echo 'active';} ?>" href="<?php echo URL; ?>matches/running">running</a>
            <a class="dateFilter--item <?php if($active == (URL . 'matches/past') ||
                                                $active == (URL . 'matches/lolscore') ||
                                                $active == (URL . 'matches/owscore') ||
                                                $active == (URL . 'matches/dota2score')) {echo 'active';} ?>" href="<?php echo URL; ?>matches/past">results</a>
        </div>
    </div>
</div>

<div class="content-switch" id="box">
