<?php require_once('includes/authorise.inc.php'); ?>
<!-- Authorise php file used to determine whether the user is logged in or not, if they aren't logged in then they will be 
redirected to the login page -->
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

        <!-- Header and navbar fragment files called here. -->
        <?php require_once('includes/header.php'); ?>
        <?php require_once('includes/navbar.php'); ?>

        <section class="containerCSS">
            <img src="assets/unsplashgym.jpg" width="100%" height="200px" alt="Gym Background">
            <!--Image sourced from Unsplash: https://unsplash.com/s/photos/gym-->
            <div class="centre2"><span style="font-size: 65px"><b>myFitness</b></span></div>
        </section>

        <article class="container pt-3">
            <h1 class="display-2 text-danger">Login Successful!</h1>
            <h4>Welcome to the member-exclusive content of Adrenaline Buzz Club.</h4><br><br>
            <p class="lead">Here you can record and track your daily exercises to see just how much exercise you are getting each day.</p>
            <p class="lead">Use the search feature below to find a category or select an exercise from one of the categories below to get started.</p>

        <!-- search box for Ajax search feature-->
        <input type="text" id="search_box" placeholder="Search for a category"><br>
        <!-- search button -->
        <input type="button" class="btn btn-info" id="search_button" value="Search">
        <!-- the div that contains search results -->
        <div id="search_results" style="padding:5px;"></div>
        

        <h1 class="display-4 text-primary mt-3 mb-4">Categories:</h1>
        <div class="row" style="text-align:center;">
            <?php foreach(readCategories() as $key => $value) { ?>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <a href="category.php?category=<?= $key; ?>">
                        <img class="border border-danger rounded-circle" src="assets/<?= $value['image-name']; ?>" />
                    </a>
                    <p style="font-size: 120%;"><?= $value['name']; ?></p>
                </div>
            <?php } ?>
        </div>
        </article>

        <!-- Footer fragment file called here -->
        <?php require_once('includes/footer.php'); ?>

    <!-- JQuery CDN-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		//Add a click listener to the search_button.
		$('#search_button').click(function(){
			//If the search_button was clicked, get the value from the search_box.
			var search_term = $('#search_box').val().trim();
			$.ajax({
				url: 'search.php',
				data: {
					q: search_term
				},
				success: function(returnData){
					//Blank the search_results div.
					$('#search_results').html('');
					//Parse the result from search.php
					var results = JSON.parse(returnData);
					//Loop through the results array and append it to the search_results div.
					$.each(results, function(key, value){
						$('#search_results').append(value + '<br>');
					});
					//If the results array is empty, display a message saying that no results were found.
					if(results.length == 0){
						$('#search_results').html('No results found');
					}
				}
			});
		});
	</script>
    </body>
</html>
