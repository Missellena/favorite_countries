<?php

/*
Controller handling 
removing countries from 
favourites
*/

if (isset($_GET['name']) && ($_GET['name'] != '')) {
    $country = $_GET['name'];
    $userId = $_SESSION['user_session'];
    
    $app['database']->removeFavourite('favourites', $userId, $country);
    header('Location: /favourites');
}