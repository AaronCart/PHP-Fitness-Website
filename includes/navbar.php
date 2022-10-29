<?php
    require_once('functions.php'); ?>

<ul class="navi">
        <li><span style="font-size: 18px;"><a href="index.php">Home</a></span></li>
        <li><span style="font-size: 18px;"><a href="services.php">Services</a></span></li>
        <li><span style="font-size: 18px;"><a href="contact.php">Contact Us</a></span></li>
        <!-- This checks to see if the user is logged in or not. If they are logged in, then the myFitness page will show up in the navbar 
        as well as a Welcome message and logout button. -->
        <?php if(isUserLoggedIn()) { ?>
            <li><span style="font-size: 18px;"><a href="myFitness.php">myFitness</a></span></li>
        <?php } ?>
        <?php if(isUserLoggedIn()) { ?>
          <li><span style="color: #f54545; font-size: 18px;">Welcome <?php echo $_SESSION[USER_SESSION_KEY]['firstname']; ?></span>
        </li>
            <li><span style="font-size: 18px;"><a href="logout.php">Logout</a></span></li>
        <?php } else { ?>
            <li><span style="font-size: 18px;"><a href="register.php">Register</a></span></li>
            <li><span style="font-size: 18px;"><a href="login.php">Login</a></span></li>
        <?php } ?>        
      </ul>