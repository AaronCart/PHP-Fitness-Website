<?php require_once('includes/authorise.inc.php'); ?>
<!-- Parts of this code are similar to that of the Week 9 Web Programming Tutorial by Matthew Bolger -->
<?php
    $user = getLoggedInUser();
    $category = getCategory($_GET['category']);
    $userStats = getUserStatsForCategory($user['email'], $category['key']);

    $errors = [];
    if(isset($_POST['createActivity'])) {
        $errors = createActivity($_POST, $user['email'], $category['key']);

        if(count($errors) === 0) {
            header("Location: category.php?category={$category['key']}");
            exit();
        }
    }
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

        <!-- Header and navbar fragment files called here -->
        <?php require_once('includes/header.php'); ?>
        <?php require_once('includes/navbar.php'); ?>

        <section class="containerCSS">
            <img src="assets/unsplashgym.jpg" width="100%" height="200px" alt="Gym Background">
            <!--Image sourced from Unsplash: https://unsplash.com/s/photos/gym-->
            <div class="centre2"><span style="font-size: 65px"><b>myFitness</b></span></div>
        </section>

        <div class="container">
        <div class="mb-4 mt-4">
            <h1 class="display-3">Logbook</h1><br>
            <h1>
                <img src="assets/<?= $category['image-name']; ?>" class="d-block d-sm-inline-block border border-success rounded-circle" />
                <?= $category['name']; ?>
            </h1>
        </div>

        <div class="row">
            <div class="col-md-6">
            <!-- This is the form for recording new activities in whichever category the user has chosen, which requires the user to 
            input; the date, the duration of the activity, their weight, their age, their BMI, and weekly goal of the category 
            activity exercise as required by the spec sheet. -->
                <form method="post">
                    <div class="form-group">
                        <label for="date">
                            Date
                            <small class="text-muted">
                                format: dd/mm/yyyy, for example today would be <?= date(DATE_FORMAT); ?>
                            </small>
                        </label>
                        <input type="text" class="form-control" id="date" name="date"
                            <?php displayValue($_POST, 'date'); ?> />
                        <?php displayError($errors, 'date'); ?>
                    </div>

                    <div class="form-group">
                        <label for="minutes">
                            Duration (minutes)
                            <small class="text-muted">
                                minimum <?= MINUTES_MINIMUM; ?> minute, maximum <?= MINUTES_MAXIMUM; ?> minutes
                            </small>
                        </label>
                        <input type="text" class="form-control" id="minutes" name="minutes"
                            <?php displayValue($_POST, 'minutes'); ?> />
                        <?php displayError($errors, 'minutes'); ?>
                    </div>

                    <div class="form-group">
                        <label for="weight">
                            Weight (kg)
                        </label>
                        <input type="text" class="form-control" id="weight" name="weight"
                            <?php displayValue($_POST, 'weight'); ?> />
                        <?php displayError($errors, 'weight'); ?>
                    </div>

                    <div class="form-group">
                        <label for="ageMf">
                            Age
                        </label>
                        <input type="text" class="form-control" id="ageMf" name="ageMf"
                            <?php displayValue($_POST, 'ageMf'); ?> />
                        <?php displayError($errors, 'ageMf'); ?>
                    </div>

                    <div class="form-group">
                        <label for="bmi">
                            BMI (Body Mass Index)
                        </label>
                        <input type="text" class="form-control" id="bmi" name="bmi"
                            <?php displayValue($_POST, 'bmi'); ?> />
                        <?php displayError($errors, 'bmi'); ?>
                    </div>

                    <div class="form-group mb-5">
                        <label for="goal">
                            Weekly Goal (how many minutes would you like to be doing this exercise)
                            <small class="text-muted">
                                minimum <?= MINUTES_MINIMUM; ?> minute, maximum <?= MINUTES_MAXIMUM; ?> minutes
                            </small>
                        </label>
                        <input type="text" class="form-control" id="goal" name="goal"
                            <?php displayValue($_POST, 'goal'); ?> />
                        <?php displayError($errors, 'goal'); ?>
                    </div>

                    <button type="submit" class="btn btn-success mr-5" name="createActivity" value="createActivity">
                        Create activity
                    </button>
                    <a href="category.php?category=<?= $category['key']; ?>" class="btn btn-outline-danger">Cancel</a>
                </form>
            </div>
        </div>
    </div>
       

        <!-- Footer fragment file called here -->
        <?php require_once('includes/footer.php'); ?>
    </body>
</html>