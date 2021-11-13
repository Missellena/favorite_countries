<?php

/*
Controller handling whether 
user is on home page
or favourites page
*/

if (isset($_SESSION['user_session'])) {
    include 'App/api/api.php';
    include 'App/views/home.view.php';
} 
else
{
    include 'App/views/login.view.php';
} 

