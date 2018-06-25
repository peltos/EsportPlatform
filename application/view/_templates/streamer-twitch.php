<?php //A modular page for loading a streamer item from Twitch ?>

<?php // check if this is a single stream => "$item["stream"]"
      // or
      // if this is a list with streamers => "$item" ?>
<?php if (isset($item["stream"])) { ?>

    <?php //Start: Streamer Item ?>
    <li class="streamers--item <?php if ($item['stream']["stream_type"] == 'live') echo 'online' ?>">

        <?php //Start: Share Button ?>

        <a class="streamer--item__share">
            <i class="fas fa-share"></i>
        </a>

        <?php //End: Share Button ?>

        <?php //Start: Social media frame with all Social media buttons ?>

        <div class="streamer--item__social">

            <?php //Facebook Button ?>

            <a target="_blank"
               href="http://www.facebook.com/sharer/sharer.php?u=https://twitch.tv/<?php echo $item['stream']["channel"]["display_name"] ?>">
                <i class="fab fa-facebook-f"></i>
            </a>

            <?php //Twitter Button ?>

            <a target="_blank"
               href="http://twitter.com/share?url=https://twitch.tv/<?php echo $item['stream']["channel"]["display_name"] ?>&text=<?php echo $item['stream']["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item['stream']["channel"]["status"] ?>:">
                <i class="fab fa-twitter"></i>
            </a>

            <?php //Google Plus Button ?>

            <a target="_blank"
               href="https://plus.google.com/share?url=https://twitch.tv/<?php echo $item['stream']["channel"]["display_name"] ?>">
                <i class="fab fa-google"></i>
            </a>

            <?php //Reddit Button ?>

            <a target="_blank"
               href="http://reddit.com/submit?url=https://twitch.tv/<?php echo $item['stream']["channel"]["display_name"] ?>&title=<?php echo $item['stream']["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item['stream']["channel"]["status"] ?>:">
                <i class="fab fa-reddit"></i>
            </a>
        </div>

        <?php //End: Social media frame with all Social media buttons ?>

        <?php //Start: Streamer content ?>

        <a class="streamer--item__content" href="<?php echo $item['stream']["channel"]["url"] ?>"
           target="_blank">
            <div class="streamers--item__container">

                <?php //Start: Streamer Thumbnail ?>

                <div class="streamers--item--image">

                    <img class="streamers--item__cover" onclick="addLike(<?php echo $item['stream']["_id"] ?>)"
                         src="<?php echo $item['stream']["preview"]["medium"] ?>"/>

                    <img class="streamers--item__icon" onclick="addLike(<?php echo $item['stream']["_id"] ?>)"
                         src="<?php echo $item['stream']["channel"]["logo"] ?>"/>
                </div>

                <?php //End: Stream Thumbnail ?>

                <?php //Start: Stream Title ?>

                <span class="streamer--item__title"><i
                            class="streamer--item__live fas fa-circle"></i> <?php echo $item['stream']["channel"]["display_name"] ?> </span>

                <?php //End: Stream Title ?>

                <?php //Start: Streamer Name ?>

                <div class="streamer-title-wrapper">
                    <p class="streamer-title"><?php echo $item['stream']["channel"]["status"] ?></p>
                </div>

                <?php //End: Streamer Name ?>
            </div>
        </a>

        <?php //End: Streamer content ?>

        <?php //Start: Follow Button (Star) ?>

        <?php if (!$_SESSION['token'] == '') { ?>
            <a class="streamer-star <?php if (!empty($followed)) {
                foreach ($followed as $follow) {
                    if ($follow->Streamer_streamID == $item['stream']["_id"]) {
                        echo ' active';
                    } else {
                        echo '';
                    }
                }
            } ?>" href="#" id="<?php echo $item['stream']["_id"] ?> "><i class="fas fa-star"></i></a>

        <?php } ?>

        <?php //End: Follow Button (Star) ?>

    </li>

    <?php //End: Streamer Item ?>

<?php // check if this is a single stream => "$item["stream"]"
      // or
      // if this is a list with streamers => "$item" ?>

<?php } else { ?>

    <?php //Start: Streamer Item ?>

    <li class="streamers--item online">

        <?php //Start: Share Button ?>

        <a class="streamer--item__share">
            <i class="fas fa-share"></i>
        </a>

        <?php //End: Share Button ?>

        <?php //Start: Social media frame with all Social media buttons ?>

        <div class="streamer--item__social">

            <?php //Facebook Button ?>

            <a target="_blank"
               href="http://www.facebook.com/sharer/sharer.php?u=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                <i class="fab fa-facebook-f"></i>
            </a>

            <?php //Twitter Button ?>

            <a target="_blank"
               href="http://twitter.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&text=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                <i class="fab fa-twitter"></i>
            </a>

            <?php //Google Plus Button ?>

            <a target="_blank"
               href="https://plus.google.com/share?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>">
                <i class="fab fa-google"></i>
            </a>

            <?php //Reddit Button ?>

            <a target="_blank"
               href="http://reddit.com/submit?url=https://twitch.tv/<?php echo $item["channel"]["display_name"] ?>&title=<?php echo $item["channel"]["display_name"] ?>&nbsp;-&nbsp;<?php echo $item["channel"]["status"] ?>:">
                <i class="fab fa-reddit"></i>
            </a>
        </div>

        <?php //End: Social media frame with all Social media buttons ?>

        <?php //Start: Streamer content ?>

        <a class="streamer--item__content" href="<?php echo $item["channel"]["url"] ?>"
           target="_blank">
            <div class="streamers--item__container">

                <?php //Start: Streamer Thumbnail ?>

                <div class="streamers--item--image">
                    <img class="streamers--item__cover" onclick="addLike(<?php echo $item['stream']["_id"] ?>)"
                         src="<?php echo $item["preview"]["medium"] ?>"/>

                    <img class="streamers--item__icon" onclick="addLike(<?php echo $item['stream']["_id"] ?>)"
                         src="<?php echo $item["channel"]["logo"] ?>"/>
                </div>

                <?php //End: Stream Thumbnail ?>

                <?php //Start: Stream Title ?>

                <span class="streamer--item__title"><i
                            class="streamer--item__live fas fa-circle"></i> <?php echo $item["channel"]["display_name"] ?> </span>

                <?php //End: Stream Title ?>

                <?php //Start: Streamer Name ?>

                <div class="streamer-title-wrapper">
                    <p class="streamer-title"><?php echo $item["channel"]["status"] ?></p>
                </div>

                <?php //End: Streamer Name ?>
            </div>
        </a>

        <?php //End: Streamer content ?>

        <?php //Start: Follow Button (Star) ?>

        <?php if (!$_SESSION['token'] == '') { ?>
            <a class="streamer-star
                            <?php
            if (!empty($followed)) {
                foreach ($followed as $follow) {
                    if ($follow->Streamer_streamID == $item["_id"]) {
                        echo ' active';
                    } else {
                        echo '';
                    }
                }
            } ?>
                            " href="#" id="<?php echo $item["_id"] ?> "><i class="fas fa-star"></i></a>

            <?php //End: Follow Button (Star) ?>

        <?php } ?>
    </li>

    <?php //End: Streamer Item ?>

<?php //Keeps count how many items there are of streamers ?>
<?php } $counter++; ?>