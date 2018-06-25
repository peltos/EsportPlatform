<?php //A modular page for loading a streamer item from Mixer ?>

<?php //Start: Streamer Item ?>
<li class="streamers--item <?php if ($item["online"] == true) echo ' online' ?>">

    <?php //Start: Share Button ?>

    <a class="streamer--item__share">
        <i class="fas fa-share"></i>
    </a>

    <?php //End: Share Button ?>

    <?php //Start: Social media frame with all Social media buttons ?>

    <div class="streamer--item__social">

        <?php //Facebook Button ?>

        <a target="_blank"
           href="http://www.facebook.com/sharer/sharer.php?u=https://mixer.com/<?php echo $item["token"] ?>">
            <i class="fab fa-facebook-f"></i>
        </a>

        <?php //Twitter Button ?>

        <a target="_blank"
           href="http://twitter.com/share?url=https://mixer.com/<?php echo $item["token"] ?>&text=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
            <i class="fab fa-twitter"></i>
        </a>

        <?php //Google Plus Button ?>

        <a target="_blank"
           href="https://plus.google.com/share?url=https://mixer.com/<?php echo $item["token"] ?>">
            <i class="fab fa-google"></i>
        </a>

        <?php //Reddit Button ?>

        <a target="_blank"
           href="http://reddit.com/submit?url=https://mixer.com/<?php echo $item["token"] ?>&title=<?php echo $item["token"] ?>&nbsp;-&nbsp;<?php echo $item["name"] ?>:">
            <i class="fab fa-reddit"></i>
        </a>
    </div>

    <?php //End: Social media frame with all Social media buttons ?>

    <?php //Start: Streamer content ?>

    <a class="streamer--item__content" href="https://mixer.com/<?php echo $item["token"] ?>"
       target="_blank">
        <div class="streamers--item__container">

            <?php //Start: Streamer Thumbnail ?>

            <div class="streamers--item--image">
                <?php
                $file = 'https://thumbs.mixer.com/channel/' . $item["id"] . '.small.jpg';
                $file_headers = @get_headers($file);
                if (!$file_headers || $file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    ?>
                    <img class="streamers--item__cover" onclick="addLike(<?php echo $item["id"] ?>)"
                         src="<?php echo $item["type"]["coverUrl"] ?>"/>
                <?php } else { ?>
                    <img class="streamers--item__cover" onclick="addLike(<?php echo $item["id"] ?>)"
                         src="https://thumbs.mixer.com/channel/<?php echo $item["id"] ?>.small.jpg"/>
                <?php } ?>

                <img class="streamers--item__icon"
                     src="https://mixer.com/api/v1/users/<?php echo $item["userId"] ?>/avatar?w=128&h=128"/>
            </div>

            <?php //End: Stream Thumbnail ?>

            <?php //Start: Stream Title ?>

            <span class="streamer--item__title">
                                    <?php if ($item['online'] == true) { ?>
                                        <i class="streamer--item__live fas fa-circle"></i>
                                    <?php } ?>
                <?php echo $item["token"] ?> </span>

            <?php //End: Stream Title ?>

            <?php //Start: Streamer Name ?>

            <div class="streamer-title-wrapper">
                <p class="streamer-title"><?php echo $item["name"] ?></p>
            </div>

            <?php //End: Streamer Name ?>

        </div>
    </a>

    <?php //End: Streamer content ?>

    <?php //Start: Follow Button (Star) ?>

    <a class="streamer-star <?php if (!empty($followed)) {
        foreach ($followed as $follow) {
            if ($follow->Streamer_streamID == $item["id"]) {
                echo ' active';
            } else {
                echo '';
            }
        }
    } ?>" href="#" id="<?php echo $item["id"] ?> "><i class="fas fa-star"></i></a>

    <?php //End: Follow Button (Star) ?>

</li>

<?php //End: Streamer Item ?>

<?php //Keeps count how many items there are of streamers ?>
<?php $counter++; ?>