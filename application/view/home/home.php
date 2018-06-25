<div class="container homepage-container">

    <h2 class="homepage-title">
        <div>
            <a href="streams" class="home-title">Recommended</a>
            <span class="tooltip">
                <i class="fas fa-info-circle"></i>
                <span class="tooltiptext">Our recommendations based on currently most followed channels.</span>
            </span>
        </div>
        <a class="view-more btn" href="streams">View More...</a>
    </h2>

    <?php //Start: Recommended Streamers ?>

    <ul class="streamers__list">
        <?php
        $counter = 0;

        // Mixer streamers

        if (!empty($followPageRecommendedMixer)) {
            foreach ($followPageRecommendedMixer as $key => $item) {
                if ($item["online"] == true) {
                    if ($counter < 4) {
                        include APP . 'view/_templates/streamer-mixer.php';
                    }
                }
            }
        }

        // Twitch streamers

        if (!empty($followPageRecommendedTwitch)) {
            foreach ($followPageRecommendedTwitch as $key => $item) {
                if (!$item['stream'] == null) {
                    if ($counter < 4) {
                        include APP . 'view/_templates/streamer-twitch.php';
                    }
                }
            }
        }
        ?>
    </ul>

    <?php //End: Recommended Streamers ?>

    <?php //Start: Followed Streamers ?>

    <?php if (!$_SESSION['email'] == '') { ?>
        <h2 class="homepage-title">
            <div>
                <a href="follow" class="home-title">Followed Channels</a>
                <span class="tooltip">
                    <i class="fas fa-info-circle"></i>
                    <span class="tooltiptext"> Check out your followed streamers that are online. </span>
                </span>
            </div>
            <a class="view-more btn" href="follow">View More...</a>
        </h2>
        <ul class="streamers__list">
            <?php
            $counter = 0;

            // Mixer streamers

            if (!empty($followPage)) {
                foreach ($followPage as $key => $item) {
                    if ($item["online"] == true) {
                        if ($counter < 4) {
                            include APP . 'view/_templates/streamer-mixer.php';
                        }
                    }
                }
            }

            // Twitch streamers

            if (!empty($followPageTwitch)) {
                foreach ($followPageTwitch as $key => $item) {
                    if (!$item['stream'] == null) {
                        if ($counter < 4) {
                            include APP . 'view/_templates/streamer-twitch.php';
                        }
                    }
                }
            }
            ?>
        </ul>
        <div class="view-more__container">
        </div>
    <?php } ?>

    <?php //End: Followed Streamers ?>

</div>
