<div class="container teams-container">

    <?php

    //    Structure of the array used here
    //
    //    array (size=1)
    //    0 =>
    //      array (size=2)
    //      'playerID' => string
    //      0 =>
    //        array (size=7)
    //          'playerName' => string
    //          'playerFirstName' => string
    //          'playerLastName' => string
    //          'playerTeamID' => string
    //          'playerTeamName' => string
    //          'playerTeamImage' => string
    //          'playerGame' => string
    //          'playerImage' => string
    //          'playerHometown' => string

    ?>


    <h2> Teams
        <span class="tooltip">
            <i class="fas fa-info-circle"></i>
            <span class="tooltiptext">View proffesional eSport teams & players.</span>
        </span>
    </h2>


    <ul class="slider">
        <?php
        $break = 0;
        if (!empty($playersDb)) {

            // this Foreach Loop will get the teams data from the database and show it

            foreach ($playersDb as $teamDb) { ?>

                <?php // Start: team item ?>


                <li class="slider-item <?php if ($teamDb[0][0]['playerTeamID'] == null) echo 'other'; ?>">


                    <?php // A For loop used to get all players of the same team. The $counter is used for array positions ?>

                    <?php for ($counter = 0; $counter < count($teamDb); $counter++) { ?>

                        <?php // Start: Info that needs to be shown only once (Example: Team Logo) ?>

                        <?php if ($counter == 0) { ?>

                            <div class="slider-item--icon">
                                <?php if ($teamDb[$counter][0]['playerTeamImage'] != null) { ?>
                                    <img class="slider-item--icon__image"
                                         src="<?php echo $teamDb[$counter][0]['playerTeamImage']; ?>"/>
                                <?php } else { ?>
                                    <img class="slider-item--icon__image"
                                         src="<?php echo URL ?>img/no-photo.png"/>
                                <?php } ?>
                            </div>

                            <?php if ($teamDb[$counter][0]['playerTeamName'] != null) { ?>
                                <p class="slider-item--teamname"><?php echo $teamDb[$counter][0]['playerTeamName']; ?></p>
                            <?php } else { ?>
                                <p class="slider-item--teamname"> These players don't have a team</p>
                            <?php } ?>

                        <?php } ?>

                        <?php // End: Info that needs to be shown only once (Example: Team Logo) ?>

                        <?php // Start: Player container ?>

                        <div class="slider-item__player">

                            <?php // Start: Player Image ?>

                            <div class="slider-item--icon">
                                <?php if ($teamDb[$counter][0]['playerImage'] != null) { ?>
                                    <img class="slider-item--icon__image"
                                         src=" <?php echo $teamDb[$counter][0]['playerImage'] ?> "/>

                                <?php } else { ?>
                                    <img class="slider-item--icon__image" src="<?php echo URL ?>img/no-photo.png">
                                <?php } ?>
                            </div>

                            <?php // End: Player Image ?>

                            <?php // Start: Player Info ?>

                            <div class="slider-item--content">
                                <span class="slider-item--titles">
                                    <p class="slider-item--content__nickname"><?php echo $teamDb[$counter][0]['playerName']; ?></p>

                                    <?php if ($teamDb[$counter][0]['playerFirstName'] != null) { ?>
                                        <p class="slider-item--content__firstLastname"><?php echo $teamDb[$counter][0]['playerFirstName'] ?><?php echo $teamDb[$counter][0]['playerLastName'] ?></p>
                                    <?php } ?>
                                </span>
                                <p class="slider-item--content__hometown">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <?php if ($teamDb[$counter][0]['playerHometown'] != null) { ?>
                                    <?php echo $teamDb[$counter][0]['playerHometown'] ?></p>
                                <?php } else { ?>
                                    Unkown </p>
                                <?php } ?>
                                <p class="slider-item--content__game">
                                    <i class="fas fa-trophy"></i>
                                    <?php if ($teamDb[$counter][0]['playerGame'] != null) { ?>
                                    <?php if ($teamDb[$counter][0]['playerGame'] != 'LoL') { ?>
                                    <?php echo $teamDb[$counter][0]['playerGame'] ?></p>
                            <?php } else { ?>
                                League of Legends
                            <?php } ?>
                            <?php } else { ?>
                                Unkown </p>
                            <?php } ?>
                            </div>

                            <?php // End: Player Info ?>

                        </div>

                        <?php // End: Player container ?>

                    <?php } ?>
                </li>

                <?php // End: Team item ?>

                <?php
            }
        }
        ?>

    </ul>

</div>
