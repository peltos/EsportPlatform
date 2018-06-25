
        <!-- end of main container -->
        </div>
    </div>

    <!-- backlink to repo on GitHub, and affiliate link to Rackspace if you want to support the project -->
    <div class="footer">
    </div>

    <?php // if the username didnt accept the agreement yet. show a footer pop-up
    if($_SESSION['cookie'] == false){ ?>
        <div class="cookie">
            <div class="cookie--inner">
                <p class="cookie--text">
                    This website uses cookies to improve user experience.
                    By using our website you consent to all
                    cookies in accordance with our Cookie Policy.
                    <a class="cookie--text--link" href="<?php echo URL; ?>cookie">Read more</a>
                </p>
                    <a class="cookie--button">OK</a>
            </div>
        </div>
    
    <?php } ?>

    <!-- jQuery, loaded in the recommended protocol-less way -->
    <!-- more http://www.paulirish.com/2010/the-protocol-relative-url/ -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- our JavaScript -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            let URL = '<?php echo URL; ?>';
        </script>
        <script>
            function menuAnimation(x) {
                let header = document.getElementById("header")
                header.classList.toggle("active");
            }
        </script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/loading.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/application.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/streamers.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/tournaments.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/nightmode.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/share.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/follow.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/cookie.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/slick.min.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/slider.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/search.js"></script>
        <script type="text/javascript"  src="<?php echo URL; ?>js/messageClear.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-46484367-5"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'UA-46484367-5');
        </script>

        </body>
</html>
