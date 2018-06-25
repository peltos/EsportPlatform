<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Esport</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?php echo URL; ?>css/manifest.css" rel="stylesheet">

    <?php //Favicon ?>

    <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
    <link rel="manifest" href="img/favicon/site.webmanifest">
    <link rel="mask-icon" href="img/favicon/safari-pinned-tab.svg" color="#f48c00">
    <meta name="msapplication-TileColor" content="#f48c00">
    <meta name="theme-color" content="#ffffff">

    <?php //Captcha ?>

    <script src='https://www.google.com/recaptcha/api.js'></script>

    <?php //FontAwesome ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <?php //Twitter Meta Code ?>

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:creator" content="">
    <meta name="twitter:title" content="Esport Platform">
    <meta name="twitter:description" content="Esport Platform homepage">
    <meta name="twitter:image" content="http://ronpelt.synology.me/ewa/img/logo__twitter.jpg">
</head>

<?php //Check if the nightmode is active. add dark-theme if so otherwise, do light-theme ?>

<body class=" <?php
if ($_SESSION['nightmode'] == 'false') {
    echo "light-theme";
} elseif ($_SESSION['nightmode'] == 'true') {
    echo "dark-theme";
} else {
    echo "light-theme";
}
?> ">

<header class="header--main" id="header">
    <div class="header--inner">
        <div class="logo">

            <?php //Logo ?>

            <a href="<?php echo URL; ?>">
                <img src="<?php echo URL ?>img/logo--white.svg">
            </a>
        </div>

        <?php //Start: Navigation ?>

        <div class="navigation">
            <a class="navigation--item" title="Home" href="<?php echo URL; ?>"><i class="fas fa-home"></i></a>
            <a class="navigation--item" href="<?php echo URL; ?>matches">Matches</a>
            <a class="navigation--item" href="<?php echo URL; ?>tournaments">Tournaments</a>
            <a class="navigation--item" href="<?php echo URL; ?>teams">Teams</a>
            <a class="navigation--item" href="<?php echo URL; ?>streams">Streamers</a>
            <a class="navigation--item" href="<?php echo URL; ?>news">News</a>
            <?php if ($_SESSION['email'] == '') {
                ?>
                <a class="navigation--item signing-up" href="<?php echo URL; ?>signup">Sign Up</a>
                <a class="navigation--item menu-box" title="Sign In" href="<?php echo URL; ?>signin"><i
                            class="fas fa-sign-in-alt"></i></a>
            <?php } else { ?>
                <a class="navigation--item" href="<?php echo URL; ?>follow">Following</a>
                <a class="navigation--item" title="View Profile" href="<?php echo URL; ?>profile"><i
                            class="far fa-user-circle"></i></a>
                <a class="navigation--item menu-box" title="Sign Out" href="<?php echo URL;  ?>home/logout"><i
                            class="fas fa-sign-out-alt"></i></a>
            <?php } ?>
        </div>

        <?php //End: Navigation ?>

        <?php //Start: Menu button Mobile ?>

        <div class="navigation-menu-icon" onclick="menuAnimation(this)">
            <div class="menu-icon__line"></div>
            <div class="menu-icon__line"></div>
            <div class="menu-icon__line"></div>
        </div>

        <?php //End: Menu button Mobile ?>

    </div>
</header>


<?php //Start: Homepage slider. Only appear if you are on the homepage ?>

<?php if (URL == (URL_PROTOCOL . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'])) { ?>
    <?php include APP . 'view/_templates/slider.php'; ?>
<? } ?>

<?php //End: Homepage slider. Only appear if you are on the homepage ?>

<div class="main-container">
    <div class="main-container--inner">
        <div class="switch-container">
            <div class="header--search hidden" id="searchbar">
                <form class="navigation--item--search" action="<?php echo URL; ?>search/redirect" method="POST">
                    <input class="navigation--item--search__input" placeholder="Search..." type="text"
                           name="search-input" value="" required/>
                    <input type="submit" name="search" value="Search">
                </form>
            </div>
            <a href="#" id="search-icon" class="search-icon"><i class="fas fa-search"></i></a>
            <p>Night Mode</p>
            <label class="switch">

                <?php // Checks if night mode is enabled. If its enabled then set input checked ?>

                <input type="checkbox" <?php if ($_SESSION['nightmode'] == 'true') {
                    echo 'checked';
                } ?>>
                <span id="nightmode" class="switch-slider round "></span>
            </label>
        </div>

        <header class="header--search" id="searchbar" hidden>
            <div class="header--inner">
                <form class="navigation--item--search" action="<?php echo URL; ?>search/redirect" method="POST">
                    <input class="navigation--item--search__input" placeholder="Search..." type="text"
                           name="search-input" value="" required/>
                    <input type="submit" name="search" value="Search">
                </form>
            </div>
        </header>
