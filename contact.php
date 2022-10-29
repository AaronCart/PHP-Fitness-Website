<!DOCTYPE html>
<html>
<head>
    <title>Adrenaline Buzz Club | Contact Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aaron Cartledge">
    <link rel="stylesheet" type="text/css" href="style/abuzzclub.css">

    <!-- jQuery Google CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- jQuery Validate Plugin sourced from Github: https://github.com/jquery-validation/jquery-validation/releases/tag/1.19.2 -->
    <script src="plugins/jquery.validate.js"></script>

    <script src="scripts/form-validation.js"></script>
</head>

<body>

    <!-- Header and navbar fragment files called here -->
    <?php require_once("includes/header.php"); ?>
    <?php require_once("includes/navbar.php"); ?>

    <section class="containerCSS">
        <img class="greyscale" src="assets/kettlebells.jpg" width="100%" height="200px" alt="Gym Background">
        <!--Image sourced from Pexels: https://www.pexels.com/collections/crossfit-gym-exercise-workout-training-rhf4lf3/-->
        <div class="centre2"><b>Contact Page</b></div>
    </section>
    <article class="home"><p class="centred">If you have any queries or would like to speak to a staff member, please fill out the contact form below and 
        a staff member will get back to you in 1-2 business days.
    </p></article>

    <article class="middle">
        <form method="post" action="mailto:admin@abcgym.com.au" name="contactUs" id="contactform">
            <label for="homeaddress"><br><b>Address:</b></label><br>
            <input type="text" id="homeaddress" name="homeaddress" size="50" value="" /><br><br>
            <label for="email"><b>Email:</b></label><br>
            <input type="text" id="email" name="email" size="50" value="" /><br><br>
            <label for="message"><b>Query:</b></label><br>
            <textarea class="query" name="message" rows="17" cols="50"></textarea><br><br>
            <input type="submit" value="Submit">
          </form> 
    </article>

    <!-- Footer fragment file called here -->
    <?php require_once("includes/footer.php"); ?>

</body>
</html>