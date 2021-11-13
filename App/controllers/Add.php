<?php

/*
Controller handling adding 
countries to favourites
*/

if (isset($_GET['name']) && ($_GET['name'] != '')) {
    $country = $_GET['name'];
    $userId = $_SESSION['user_session'];
    $result = $app['database']->addFavourite('favourites', $userId, $country);
    header('Location: /?result='.$result['message']);
}