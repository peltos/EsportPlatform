<div class="container signup-controller">

  <?php // On page load --> Require reCaptcha to be filled. ?>
  <script>
    window.onload = function() {
      var $recaptcha = document.querySelector('#g-recaptcha-response');

      if($recaptcha) {
          $recaptcha.setAttribute("required", "required");
      }
    };
  </script>

  <?php // On form submission --> POST input to signup/adduser controller. ?>
    <form action="<?php echo URL; ?>signup/adduser" method="POST">
        <h1 class="homepage-title"> Sign Up </h1>
        <div class="signup-box">

          <?php // If form input is incorrect --> show message. ?>
            <p><?php echo $_SESSION['message'] ?></p>
            <div class="signup-username">
                <span class="user-icon"><i class="fas fa-user"></i></span>
                <input type="text" name="username" value="<?php echo $_SESSION['addUserUsername']; ?>" placeholder="Username" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Username'" required>
            </div>
            <div class="signup-email">
                <span class="email-icon"><i class="far fa-envelope"></i></span>
                <input type="text" name="email" value="<?php echo $_SESSION['addUserEmail']; ?>" placeholder="Email Address" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Email Address'" required/>
            </div>
            <div class="signup-password">
                <span class="password-icon"><i class="fas fa-lock"></i></span>
                <input type="password" name="password" value="" placeholder="Password" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Password'" required/>
            </div>
            <div class="signup-passwordcheck">
                <span class="user-icon"><i class="fas fa-check"></i></span>
                <input type="password" name="passwordcheck" value="" placeholder="Confirm Password"
                       onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm Password'" required/>
            </div>

             <div class="g-recaptcha" data-sitekey="6LcZoVAUAAAAAJMN1MqE_0s89kpMBxtHzE8J_HQi"></div>
            <input class="signup-submit" type="submit" name="adduser" value="submit"/>
        </div>

    </form>

</div>
