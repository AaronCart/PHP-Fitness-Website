<?php
// Parts of this code is from Lecture 10 Web Programming by Shekar Khalra
 
// Activity List array of categories for Ajax Search.
$activityList = array(
    'Gardening',
    'Motorcycle Riding',
    'Mowing the lawn',
    'Shopping',
    'Walking',
    'Walking the dog'
);
 
//Get the search term from "q" GET variable.
$q = isset($_GET['q']) ? trim($_GET['q']) : '';
 
//Array to hold results to return them back to the Ajax function.
$results = array();
 
//Loop through array of activities.
foreach($activityList as $activity){
 
    //If the search term is present in category name add it to the results array.
    if(stristr($activity, $q)){
        $results[] = $activity;
    }
}
 
//Display the results in JSON format so that it can be parsed with JavaScript.
echo json_encode($results);

?>

