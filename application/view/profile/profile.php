<div class="container profile-controller signin-controller">

    <form action="<?php echo URL; ?>profile/updateProfile" method="POST">
        <h1 class="homepage-title"> My Profile </h1>
        <div class="profile-box">
<!---->
<!--            <div class="profile-lastlogin" title="Last Login">-->
<!--                <span class="history-icon"><i class="fa fa-history"></i></span>-->
<!--                <input type="text" name="username3" value="" placeholder="--><?php //echo $_SESSION['username'] ?><!--" disabled/>-->
<!--            </div>-->

            <div class="profile-email" title="Email">
                <span class="email-icon"><i class="far fa-envelope"></i></span>
                <input type="text" name="email" value="" placeholder="<?php echo $_SESSION['email'] ?>" disabled/>
            </div>

            <div class="profile-username" title="Username">
                <span class="user-icon"><i class="fas fa-user"></i></span>

                <input type="text" name="username2" value="" placeholder="<?php echo $_SESSION['username'] ?>"disabled/>

            </div>
            </br>

            <p class="message-profile"> <?php echo $_SESSION['message'] ?> </p>
            <div class="change-username" title="Change Username">
                <span class="change-icon"><i class="fas fa-user"></i></span>
                <input type="text" name="username" value="" placeholder="New Username" onfocus="this.placeholder = ''"
                      onblur="this.placeholder = 'New Username'" >
            </div>

            <div class="change-oldpassword" title="Type in your current password">
              <span class="change-icon"><i class="fas fa-lock"></i></span>
                <input type="password" name="currentpassword" value="" placeholder="Current Password" onfocus="this.placeholder = ''"
                      autocomplete="new-password" onblur="this.placeholder = 'Current Password'" >
            </div>

            <div class="change-newpassword" title="Create new password">
              <span class="change-icon"><i class="fas fa-lock"></i></span>
                <input type="password" name="Newpassword" value="" placeholder="New Password" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'New Password'" >
            </div>

            <div class="change-confirm" title="Confirm your password">
                <span class="change-icon"><i class="fas fa-check"></i></span>
                <input type="password" name="Confirmnewpassword" value="" placeholder="Confirm new password" onfocus="this.placeholder = ''"
                       onblur="this.placeholder = 'Confirm new password'" >
            </div>

            <input class="profile-submit" type="submit" name="updateProfile" value="Update Profile"/>

        </div>

    </form>
  </br>

</div>
