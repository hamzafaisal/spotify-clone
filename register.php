<?php include("includes/header.php"); ?>
 
  <?php $account = new Account(); ?>

<?php include("includes/handlers/login_handler.php"); ?>
<?php include("includes/handlers/signup_handler.php"); ?>
        
    <div id="background">
        
    <div id="loginContainer">
    
    <div id="inputContainer">

    <form id="loginForm" action="register.php" method="POST">

        <h2>Login to your account</h2>
            <p class="errorMessage"><?php echo $account->get_error(Constants::$wrong_login); ?></p>
            <p><label for="loginUsername">Username</label>
            <input id="loginUsername" class="" name="username" type="text" placeholder="e.g. bartSimpson" 
            value="<?php $account->get_input_value('username'); ?>" required></p>

            <p><label for="loginPassword">Password</label>
            <input  id="loginPassword" class="" name="password" type="password" value="<?php $account->get_input_value('password'); ?>" required></p>

        <button type="submit" class="" name="login">LOG IN</button>
        
        <div class="hasAccount">
        <span id="hidelogin">Don't have account yet? Signup here!</span>
        </div>

    </form>

    <form id="signupForm" action="register.php" method="POST">
    <br> 
        <h2>Signup</h2>
        

    <?php echo $account->get_error(Constants::$username); ?>
    <?php echo $account->get_error(Constants::$username_taken); ?>
    <p><label for="signusername">Username</label>
    <input id="signusername" class="   " name="signusername" type="text" placeholder="e.g. bartSimpson" value="<?php $account->get_input_value('signusername'); ?>" required></p>

    <?php echo $account->get_error(Constants::$first); ?>
    <p><label for="first">First Name</label>
    <input id="first" class="   " name="first" type="text" placeholder="e.g. bartSimpson" value="<?php $account->get_input_value('first'); ?>" required></p>

    <?php echo $account->get_error(Constants::$last); ?>
    <p><label for="last">Last Name</label>
    <input id="last" class="   " name="last" type="text" placeholder="e.g. bartSimpson" value="<?php $account->get_input_value('last'); ?>" required></p>

    <p><?php echo $account->get_error(Constants::$email); ?>
    <?php echo $account->get_error(Constants::$email_taken); ?>
    <label for="email">E-Mail</label>
    <input id="email" class="   " name="email" type="email" value="<?php $account->get_input_value('email'); ?>" required></p>

    <?php echo $account->get_error(Constants::$password); ?>
    <?php echo $account->get_error(Constants::$password_limit); ?>
    <p><label for="signpassword">Password</label>
    <input  id="signpassword" class="   " name="signpassword" type="password" value="<?php $account->get_input_value('signpassword'); ?>" required></p>

   <p><?php echo $account->get_error(Constants::$confirm); ?>
    <label for="confirmpassword"> Confirm Password</label>
    <input  id="confirmpassword" class="   " name="confirmpassword" type="password" value="<?php $account->get_input_value('confirmpassword'); ?>" required></p>

        <button type="submit" class="" name="signup">Signup</button>
        
        
        <div class="hasAccount">
        <span id="hidesignup">Already have account? Login here!</span>
        
        </div>


    </form>
</div>
			<div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to keep up to date</li>
				</ul>
			</div>

</div>





</div>
<?php include("includes/footer.php"); ?>

 
     <?php
     if(isset($_POST['signup'])){
         echo     '<script>
                   $(document).ready(function(){

                      $("#signupForm").show();
                      $("#loginForm").hide();

                   });    

                  </script>';
         
     }  else {
         echo     '<script>
                   $(document).ready(function(){

                      $("#signupForm").hide();
                      $("#loginForm").show();

                   });    

                  </script>';
         
     }
        
        
        
   ?>    
<!--
     
     <script type="text/javascript">
      $(document).ready(function(){

      $("#signupForm").hide();
      $("#loginForm").show();
       
});    
    </script>
-->
   