<?php

/*
Controller handling all 
display of favourite 
countries and their comments
*/

if (isset($_SESSION['user_session'])) {
    include 'App/api/api.php';
    $userId = $_SESSION['user_session'];
    $favourites = $app['database']->getFavourites('favourites', $userId);
    $comments = $app['database']->getComments('comments', $userId);
    include 'App/views/home.view.php';
} 
else 
{
    include 'App/views/login.view.php';
}
