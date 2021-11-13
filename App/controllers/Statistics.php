<?php

/*
Controller handling the statistics page
*/

if (isset($_SESSION['user_session'])) {

    $result = $app['database']->getAllFavourites();
    include 'App/views/statistics.view.php';
} 
else
{
    include 'App/views/login.view.php';
} 