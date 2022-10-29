<?php require_once('includes/functions.php'); ?>
<!-- The require_once is used to call the functions php file in order to validate whether the user 
has inputted the correct email and password when logging in. If they input the correct information then they get taken to the myFitness php page. -->
<?php
    $errors = [];
    if(isset($_POST['login'])) {
        $errors = loginUser($_POST);

        if(count($errors) === 0) {
            header('Location: myFitness.php');
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
<title>Adrenaline Buzz Club | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aaron Cartledge">
    <link rel="stylesheet" type="text/css" href="style/abuzzclub.css">
    
</head>
<body>
    <!-- Fragment header and navbar from the 'includes' directory -->
<?php require_once('includes/header.php'); ?>
<?php require_once('includes/navbar.php'); ?>

<section class="containerCSS">
        <img class="greyscale2" src="assets/barbells.jpg" width="100%" height="200px" alt="Gym Background">
        <!--Image sourced from Pexels: https://www.pexels.com/collections/crossfit-gym-exercise-workout-training-rhf4lf3/-->
        <div class="centre2"><b>Login Page</b></div>
   
    </section>
    <article class="home"><p class="centred">To access myFitness, please login with your member details below.</p><br>
    <h1 class="main"><span style="color: #00354e;"><u>Membership Login</u></span></h1>
    </article>

    <!-- The displayValue function are used so that information entered isn't forgotten when errors are made. The displayError function shows 
    the error message when a wrong email or password is entered into the form.-->
        <article class="register">
            <form id="login_form" method="post">
                <div><span class="label"><b>Email:</b></span><br>
                    <input type="text" id="email" name="email"
                        <?php displayValue($_POST, 'email'); ?> />
                    <span style="color: red; font-size: 15px"><?php displayError($errors, 'email'); ?></span>
                </div><br>

                <div><span class="label"><b>Password:</b></span><br>
                    <input type="password" id="password" name="password" />
                    <span style="color: red; font-size: 15px"><?php displayError($errors, 'password'); ?></span>
                </div><br>

                <button type="submit" name="login" value="login">Login</button>
                
            </form>
        </article>

        <!-- Fragment footer file from 'includes' directory -->
        <?php require_once('includes/footer.php'); ?>
    
</body>
</html>
