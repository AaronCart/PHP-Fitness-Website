<?php
    require_once('functions.php');
// If the user is not logged in then they will be redirected to the login page should they try to access the myFitness page without logging in first
    if(!isUserLoggedIn()) {
        header('Location: login.php');
        exit();
    }
