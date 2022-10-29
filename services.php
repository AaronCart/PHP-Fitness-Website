<!DOCTYPE html>
<html>
<head>
    <title>Adrenaline Buzz Club | Services</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Aaron Cartledge">
    <link rel="stylesheet" type="text/css" href="style/abuzzclub.css">
</head>

<body>

    <?php require_once("includes/header.php"); ?>

    <?php require_once("includes/navbar.php"); ?>

    <section class="containerCSS">
        <img class="greyscale2" src="assets/barbells.jpg" width="100%" height="200px" alt="Gym Background">
        <!--Image sourced from Pexels: https://www.pexels.com/collections/crossfit-gym-exercise-workout-training-rhf4lf3/-->
        <div class="centre2"><b>Services</b></div>
   
    </section>
    <article class="home2">
        <p class="centred2">WHAT WE DO</p>
        <p class="centredsmall">We have a wide range of services here at Adrenaline Buzz Club that is easily accessible to all of 
            our clients whether they prefer to train online or in person.</p>
        <p class="centredsmall">Due to the unfortunate events of COVID-19, we have decided to incorporate the use of online training programs 
            for the first time. This allows you to experience the same intense and rewarding workouts of our group classes as if you 
            were right back here at the gym in person.</p><br>
            <p class="centredsmall">
            Join our program and take part in virtual classes online over Zoom calls. You will have a trainer guiding you every session, 
            in small to large groups, pushing you to keep aiming for that personal best.</p>
            
            <p class="centredsmall">Or perhaps you would prefer a more personal experience. Well fear not, we also provide one on one private Zoom
                sessions each week for those who want a more focused experience with a personal trainer.
            </p><br>

            <p class="centredsmall">Looking for advice on diets and nutrition? We have several free recipes and suggestions available to anyone
                who is looking for the healthiest of meals. After all, a healthy meal leads to a clear mind and a rejuvenated soul.
            </p>


    </article>
    <article class="blackserv">    
        <video class="nopad" width="50%" height="auto" controls><source src="assets/coaching.mp4" type="video/mp4"></video>
            <!--Video sourced from Pexels: https://www.pexels.com/collections/crossfit-gym-exercise-workout-training-rhf4lf3/-->
        <div class="right1"><b>PRIVATE COACHING</b><br>
            <p class="right2">1-on-1 Sessions Online or in Person</p>
            <p class="right3">45-60 minute online or in-person sessions with a personal trainer. Train in <b><u>Your</u></b> time at
                 <b><u>Your</u></b> pace.</p>
        </div>
        </article>


    <article class="white"> 
        <video class="nopad" width="50%" height="auto" controls><source src="assets/skipping.mp4" type="video/mp4"></video>
            <!--Video sourced from Pexels: https://www.pexels.com/collections/crossfit-gym-exercise-workout-training-rhf4lf3/-->
        <div class="right1"><b>GROUP CARDIO TRAINING</b><br>
            <p class="right2">Socialise, Sweat, Succeed</p>
            <p class="right3"><span style="color: #001823;">Our 60 minute casual cardio sessions are perfect for all ages and skill levels, 
                whether you're only just getting into fitness or you are a national champion, you'll be having fun while you get fit.</span></p>
        </div>
        </article>


    <article class="blackserv">    
        <img class="nopad" src="assets/food.jpg" width="50%" height="auto" alt="Nutritious Meal">
        <!--Image sourced from Pexels: https://www.pexels.com/search/nutrition/-->
        <div class="right1"><b>MEALS & RECIPE SUGGESTIONS</b><br>
            <p class="right2">Build Confidence in the Kitchen!</p>
            <p class="right3">Build your cooking skills to improve your diet and mental health! For free recipes and nutrition 
                guidance, <a class="new2" href="register.php">click here</a>.</p>
                <!--This would link to another page with recipes and a nutrition program but it is not required for this assignment so I
                have linked the href to the register page.-->
        </div>
        </article>

        <article class="white"> 
            <video class="nopad" width="50%" height="auto" controls><source src="assets/yoga.mp4" type="video/mp4"></video>
                <!--Video sourced from Pexels: https://www.pexels.com/search/videos/instructional%20workout/-->
            <div class="right1"><b>DAILY ONLINE SESSIONS</b><br>
                <p class="right2">New Video Every Day!</p>
                <p class="right3"><span style="color: #001823;">Want to take a quick workout session right now? You're in luck, this page
                is updated every day with a new instructional workout video that you can follow along with from the comfort of your own home.
                <a class="new2" href="register.php">Register now</a> to get access to these exclusive daily videos! Here's one free video
                to get a taste of what being a member of Adrenaline Buzz Club is all about!</span></p>
            </div>
            <!--The idea here is that the user can watch an instructional workout video every day, however, I could not find any free instructional
            workout videos on Pexels of 30 minutes or more, so I put in a 5 second instructional clip to fill the space as a "Free teaser video" for
            new clients.-->
        </article>



        <?php require_once("includes/footer.php"); ?>
       
</body>
</html>
