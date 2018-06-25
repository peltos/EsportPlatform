
<?php //Start: Slider ?>


<ul class="slider-front">

    <?php //Start: Loop for the first 5 tournaments  ?>

    <?php
    $break = 0;
    if (!empty($slider)) {
        foreach ($slider as $key => $item) { ?>

            <?php //Start: Tournaments Item ?>

            <li class="slider-item">

                <?php //Start: Tournaments background selected on game ?>

                <div class="slider-item--background">
                    <?php if ($item['videogame']['name'] == 'Dota 2') { ?>
                        <img class="slider-item--background__image"
                             src="<?php echo URL ?>img/backgrounds/dota-background.jpg"/>
                    <?php } elseif ($item['videogame']['name'] == 'LoL') { ?>
                        <img class="slider-item--background__image"
                             src="<?php echo URL ?>img/backgrounds/lol-background.jpg"/>
                    <?php } elseif ($item['videogame']['name'] == 'Overwatch') { ?>
                        <img class="slider-item--background__image"
                             src="<?php echo URL ?>img/backgrounds/overwatch-background.jpg"/>
                    <?php } else { ?>
                        <img class="slider-item--background__image"
                             src="<?php echo URL ?>img/backgrounds/generic-background.jpg"/>
                    <?php } ?>
                </div>

                <?php //End: Tournaments background selected on game ?>

                <?php //Start: Tournaments Content ?>

                <div class="slider-item--content">

                    <?php //Start: Tournaments Date ?>

                    <span class="slider-item--content__date">
                            <p class="slider-item--content__date__time ">
                                <?php echo date('d F H:i', strtotime($item["begin_at"]) + 60 * 60) ?>
                            </p>
                        </span>

                    <?php //End: Tournaments Date ?>

                    <?php //Start: Tournaments Icon ?>

                    <span class="slider-item--content__icon">
                            <img class="slider-item--content__icon__image"
                                 src="<?php echo $item["league"]["image_url"] ?> "/>
                        </span>

                    <?php //End: Tournaments Icon ?>

                    <?php //Start: Tournaments Info ?>

                    <span class="slider-item--content__info">

                            <?php //Start: Tournament Game ?>

                        <p class="slider-item--content__info__name"> <?php if ($item["videogame"]['name'] == 'LoL') {
                                echo 'League of Legends';
                            } else {
                                echo $item["videogame"]['name'];
                            } ?>
                            </p>

                        <?php //End: Tournament Game ?>

                        <?php //Start: Tournament Versus ?>

                        <div class="slider-item--content__info__matchup">
                                <?php if (!$item["opponents"] == null || !$item["opponents"] == "") {
                                    $oppCounter = 0;
                                    foreach ($item["opponents"] as $key => $itemOpponents) {
                                        if ($oppCounter !== 0) { ?>
                                            <p class="slider-item--content__info__matchup__vs">VS</p>
                                        <?php } ?>


                                        <div class="slider-item--content__info__matchup__item">
                                            <?php if (!$itemOpponents["opponent"]["image_url"] == null || !$itemOpponents["opponent"]["image_url"] == "") { ?>
                                                <img class="slider-item--content__info__matchup__item__img"
                                                     src="<?php echo $itemOpponents['opponent']["image_url"] ?>"/>
                                            <?php } ?>
                                            <p class="slider-item--content__info__matchup__item__game">
                                                <?php echo $itemOpponents['opponent']['name'] ?>
                                            </p>
                                        </div>
                                        <?php $oppCounter++;
                                    }
                                } else { ?>
                                    <p class="slider-item--content__info__matchup__no-info">No match data available</p>
                                <?php } ?>
                            </div>

                        <?php //End: Tournament Versus ?>

                        <?php //Start: Tournament Name ?>

                        <p class="slider-item--content__info__tournament"> TOURNAMENT: </p>
                            <p class="slider-item--content__info__tournamentname"> <?php echo $item["tournament"]['name'] ?></p>

                        <?php //End: Tournament Name ?>

                        </span>

                    <?php //End: Tournaments info ?>

                </div>

                <?php //End: Tournaments Content ?>

            </li>

            <?php //End: Tournaments Item ?>

            <?php //Check if there are 5 items. When there are 5 items use a break ?>
            <?php
            $break++;
            if ($break == 5) break;
        }
    } ?>

    <?php //End: Loop for the first 5 tournaments  ?>

</ul>

<h2 class="slider__heading">Tournaments</h2>

<?php //End: Slider ?>