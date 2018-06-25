<div class="container signin-controller">

  <?php // On form submission --> POST input to signin/checkUser controller. ?>
    <form action="<?php echo URL; ?>signin/checkUser" method="POST">
        <h1 class="homepage-title"> Sign In </h1>
        <div class="signin-box">

          <?php // If form input is incorrect --> show message. ?>
            <p><?php echo $_SESSION['message'] ?></p>
            <div class="signin-email">
                <span class="email-icon"><i class="far fa-envelope"></i></span>
                <?php // If form input is incorrect --> Keep input data for convience. ?>
                <input type="text" name="email" value="<?php echo $_SESSION['signinEmail'] ?>" placeholder="Email Adress" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Email Adress'" required/>
            </div>
            <div class="signin-password">
                <span class="password-icon"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" value="" placeholder="Password" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Password'" required/>
            </div>
            <input class="signin-submit" type="submit" name="signInUser" value="Sign In"/>
        </div>

    </form>

</div>
