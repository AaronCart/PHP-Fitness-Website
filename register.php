<?php require_once('includes/functions.php'); ?> 
<!-- The functions file is called for the PHP form validation of this register page -->
 <?php
    $errors = [];
    if(isset($_POST['submit'])) {
        $errors = registerUser($_POST);

        // If the user successfully registers without any errors then they will be taken to the myFitness page.
        if(count($errors) === 0) {
            header('Location: myFitness.php');
            exit();
        }
    }
?> 

<!DOCTYPE html>
<html>
<head>
    <title>Adrenaline Buzz Club | Register</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aaron Cartledge">
    <link rel="stylesheet" type="text/css" href="style/abuzzclub.css">
</head>

<body>

    <!-- Header and Navbar fragment files called here -->
    <?php require_once("includes/header.php"); ?>
    <?php require_once("includes/navbar.php"); ?>

    <section class="containerCSS">
        <img src="assets/unsplashgym.jpg" width="100%" height="200px" alt="Gym Background">
        <!--Image sourced from Unsplash: https://unsplash.com/s/photos/gym-->
        <div class="centre2"><b>Register</b></div>
        
    </section>
    <article class="home"><p class="centred">To become a member and get access to all the amazing services and benefits of Adrenaline Buzz Club, 
        please fill out the form below and start your new journey with <span style="color: #ff0000;"><b><u>ABC</u></b></span>!
    </p><br>
    <h1 class="main"><span style="color: #00354e;"><u>Membership Registration Form</u></span></h1>
    </article>

    <article class="register">

        <form id="registration_form" method="post">
            
            <div><span class="label"><b>First Name:</b></span><br>
                <input name="firstname" type="text" id="firstname" <?php displayValue($_POST, 'firstname'); ?> />
                <span style="color: red; font-size: 15px"><?php displayError($errors, 'firstname'); ?></span>
            </div><br>
            
            <div><span class="label"><b>Surname:</b></span><br>
                <input name="surname" type="text" id="surname" <?php displayValue($_POST, 'surname'); ?> />
                <span style="color: red; font-size: 15px"><?php displayError($errors, 'surname'); ?></span>
            </div><br>

            <div><span class="label"><b>Email:</b></span><br>
                <input name="email" type="text" id="email" <?php displayValue($_POST, 'email'); ?> />
                <span style="color: red; font-size: 15px"><?php displayError($errors, 'email'); ?></span>
            </div><br>

            <div><span class="label"><b>Address: </b><span style="font-size: 75%; color: #16c000;">(Optional)</span></span><br><br>
                <textarea class="addressreg" name="address" id="address"></textarea><br><br></div>

            <div><span class="label"><b>Referral:</b></span><br>
                <input name="refer" type="radio" id="yes" value="Yes">
                <label for="yes"><span style="position: absolute; left: 27%; font-size: 80%; padding: 0.5% 0% 0%;">Yes</span></label>
                <input name="refer" type="radio" id="no" value="No">
                <label for="no"><span style="position: relative; right: 26%; font-size: 80%;">No</span></label><br>
                <span style="color: red; font-size: 15px"><?php displayError($errors, 'refer'); ?></span>
            </div><br>

            <div><span class="label"><b>Membership Type:</b></span><br><br>
                <select name="membership" id="membership">
                    <option selected="selected">Choose Your Membership Type</option>
                    <option value="individual">Individual</option>
                    <option value="family">Family</option>
                </select>
                <br>
                <span style="color: red; font-size: 15px"><?php displayError($errors, 'membership'); ?></span>
            </div><br>

            <div><span class="label"><b>Age:</b></span><br>
                <label for="age"><span style="font-size: 80%;">Use the Slider to Select Your Age (0-100):</span></label>
                <input type="range" id="age" name="age">
                <span id="ageinput" style="font-size: 70%; margin-right: 0%; font-weight: bold; color: #ff0000;"></span>
                <span style="color: red; font-size: 15px"><?php displayError($errors, 'age'); ?></span>
            </div><br>

            <div><span class="label"><b>Duration of Membership:</b></span><br><br>
                <select name="duration" id="duration">
                    <option selected="selected">Choose Your Membership Duration</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="3months">3 Months</option>
                    <option value="6months">6 Months</option>
                    <option value="yearly">Yearly</option>
                </select>
                <br>
                <span style="color: red; font-size: 15px"><?php displayError($errors, 'duration'); ?></span>
            </div><br>

            <div><span class="label"><b>New Password:</b></span><br>
                <input name="password" type="password" value="" id="password"/>
                <span style="color: red; font-size: 15px"><?php displayError($errors, 'password'); ?></span>
            </div><br>

            <div><input id="registration_submit" type="submit" name="submit" value="Submit Form"/></div>
        </form>
    </article>

    <!-- Footer fragment file called here -->
    <?php require_once("includes/footer.php"); ?>

   <!-- Short JavaScript used here to show the output of the age slider -->
    <script>
        var slider = document.getElementById("age");
        var output = document.getElementById("ageinput");
            output.innerHTML = slider.value;
            slider.oninput = function() {
            output.innerHTML = this.value;
            }
    </script>
    <!--This Javascript function was sourced from W3Schools for displaying the value of the 
    slider: https://www.w3schools.com/howto/tryit.asp?filename=tryhow_css_js_rangeslider -->

</body>
</html>