<?php require_once('includes/authorise.inc.php'); ?>
<!-- Parts of this code is used from the Week 9 tutorial by Matthew Bolger -->
<?php
    $user = getLoggedInUser();
    $category = getCategory($_GET['category']);
    $userStats = getUserStatsForCategory($user['email'], $category['key']);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Adrenaline Buzz Club | myFitness</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Aaron Cartledge">
        <link rel="stylesheet" type="text/css" href="style/abuzzclub.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" 
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>

    <body>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" 
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" 
        crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" 
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" 
        crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" 
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" 
        crossorigin="anonymous"></script>

        <!-- Header and navbar fragment files -->
        <?php require_once('includes/header.php'); ?>
        <?php require_once('includes/navbar.php'); ?>

        <section class="containerCSS">
            <img src="assets/unsplashgym.jpg" width="100%" height="200px" alt="Gym Background">
            <!--Image sourced from Unsplash: https://unsplash.com/s/photos/gym-->
            <div class="centre2"><span style="font-size: 65px"><b>myFitness</b></span></div>
        </section>

        <div class="container">
        <div class="mb-5 mt-4">
            <h1 class="display-3">Logbook</h1><br>
            <h1>
                <img src="assets/<?= $category['image-name']; ?>" class="d-block d-sm-inline-block border border-success rounded-circle" />
                <?= $category['name']; ?>
            </h1>
        </div>

        <div class="mb-4">
            <a href="createActivity.php?category=<?= $category['key']; ?>" class="btn btn-success mr-5">
                Record activity
            </a>
            <a href="myFitness.php" class="btn btn-outline-danger">Back to myFitness</a>
        </div>

        <!-- If a user has recorded any activities for the chosen category then their information will be displayed in the graphical table below -->
        <?php if(count($userStats) !== 0) { ?>
            <table class="table table-bordered table-striped" style="text-align:center">
                <thead>
                    <tr class="table-success">
                      <th colspan="6" style="font-size: 25px;">Your Recorded Activity Level for <?= $category['name']; ?></th>
                    </tr>
                    <tr>
                        <!-- Calendar Image sourced from PNGFind: https://www.pngfind.com/mpng/Thwmho_png-file-svg-calendar-icon-31-transparent-png/ -->
                        <th><span style="color: red;">Date</span><br><img src="assets/calendar.png" alt="Calendar Image" width="65" height="59"></th>
                        <!-- Timer Image sourced from topPNG: https://toppng.com/show_download/127272/icon-04-timer-icon/large -->
                        <th><span style="color: red;">Duration</span><br><img src="assets/timer.png" alt="Timer Image" width="65" height="59"></th>
                        <!-- Scales Image sourced from ClipArtMax: https://www.clipartmax.com/middle/m2i8A0K9i8b1m2N4_lose-weight-in-a-month-weight-scale-icon-png/ -->
                        <th><span style="color: red;">Weight</span><br><img src="assets/scales.png" alt="Timer Image" width="65" height="59"></th>
                        <!-- Age Image sourced from OnlineWebFonts: https://www.onlinewebfonts.com/icon/86026 -->
                        <th><span style="color: red;">Age</span><br><img src="assets/age16.png" alt="Timer Image" width="65" height="59"></th>
                        <!-- BMI Image sourced from PNGIo: https://pngio.com/images/png-a2157129.html -->
                        <th><span style="color: red;">BMI</span><br><img src="assets/bmi.png" alt="Timer Image" width="65" height="59"></th>
                        <!-- Goal Image sourced from Icon-Library: https://icon-library.com/icon/goal-icon-png-11.html -->
                        <th><span style="color: red;">Weekly Goal</span><br><img src="assets/goal.png" alt="Timer Image" width="65" height="59"></th>
                    </tr>
                    <tr>
                    <th>(dd/mm/yyyy)</th>
                    <th>(minutes)</th>
                    <th>(kg)</th>
                    <th>(years)</th>
                    <th>(kg/m<sup>2</sup>)</th>
                    <th>(minutes)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($userStats as $value) { ?>
                        <tr>
                            <td><?= $value['date']; ?></td>
                            <td><?= $value['minutes']; ?></td>
                            <td><?= $value['weight']; ?></td>
                            <td><?= $value['ageMf']; ?></td>
                            <td><?= $value['bmi']; ?></td>
                            <td><?= $value['goal']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
        <!-- If the user has not recorded any data yet then a message will be shown saying that have not recorded any activities yet -->
            <p class="alert alert-warning">You haven't recorded any activities in this category yet.</p>
        <?php } ?>
    </div>
    <!-- Footer fragment files -->
    <?php require_once('includes/footer.php'); ?>
    </body>
</html>