<!DOCTYPE html>
<html>
<head>
    <title>Adrenaline Buzz Club | Homepage</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aaron Cartledge">
    <link rel="stylesheet" type="text/css" href="style/abuzzclub.css">
</head>

<body>

    <?php require_once("includes/header.php"); ?>

    <?php require_once("includes/navbar.php"); ?>

    <section class="containerCSS">
        <img class="greyscale" src="assets/rogueGym.jpg" width="100%" height="100%" alt="Gym Background">
        <!--Image sourced from Pexels: https://www.pexels.com/collections/crossfit-gym-exercise-workout-training-rhf4lf3/-->
        <div class="centre"><b>Welcome to <span style="color: #ff0000;"><u>A</u></span>drenaline <span style="color: #ff0000;"><u>B</u></span>uzz
        <span style="color: #ff0000;"><u> C</u></span>lub</b></div>
        <div class="centresmall"><b><u>Open 24/7</u></b></div>
        <div class="left"><p>IM<span style="color: #000000;">PR</span>OVING LIVES.</p></div>
        <div class="leftsmall"><p>online and <span style="color: #000000;">in </span><span style="color: #ff0000;">pers</span>on.<p></div>
        <a class="new1" href="services.php">Click Here to Get Started Today</a>
    </section>
    <article class="home">
        <h1 class="main"><span style="color: #ff0000;">A</span>UTHENTICITY + <span style="color: #ff0000;">B</span>RAVERY + 
            <span style="color: #ff0000;">C</span>OURAGE</h1>
        <p class="centred">The 3 Values of Adrenaline Buzz Club</p>
    </article>
        
    <article class="black">    
        <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">Here at Adrenaline Buzz Club, we strive to create a 
            welcoming and supportive environment for all our clients. We were first establised in the year 2000 and have been 
            operating in the sprawiling City of Casey every since. Unfortunatley due to these unprecedented times, we have been 
            forced to move our services online until we can all safely return to our face to face training. But fear not, 
            Adrenaline Buzz Club will continue to thrive and we aim to continue growing our ever-growing family. Adrenaline Buzz Club 
            is currently home to 200 members and with your help, we can keep pushing those numbers up. We are an inclusive club and 
            welcome people from all walks of life, whether you love to exercise, socialise with friends, wanting to self-improve or 
            just aiming to be the next Arnold Schwarzenegger, then Adrenaline Buzz Club is the club for you. <a class="new2" href="contact.php">Contact us</a> directly for any queries 
            you may have. If you would like to become a member of our club, please <a class="new2" href="register.php">register your interest here</a>.<br> 
            <p style="text-align: center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">And as always, be Authentic, be Brave, and be Courageous.</p>
    </p></article>

    <article class="video">
        <h1 class="main">Your Gym | Your Community</h1>

        <video width="340" height="auto" controls><source src="assets/lift.mp4" type="video/mp4"></video>
        <img src="assets/emptygym.jpg" width="300" height="auto" alt="Empty Gym">
        <video width="371" height="auto" controls><source src="assets/warmup.mp4" type="video/mp4"></video>
             <!--Videos and Image sourced from Pexels: https://www.pexels.com/collections/crossfit-gym-exercise-workout-training-rhf4lf3/-->
        <p>Check out our full range of <a class="new2" href="services.php">services here</a></p>


    </article>

    <?php require_once("includes/footer.php"); ?>

</body>
</html>

