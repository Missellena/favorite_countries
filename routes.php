<?php

$router->get('', 'App/controllers/Home.php');
$router->get('favourites', 'App/controllers/Favourites.php');
$router->post('login', 'App/controllers/Login.php');
$router->get('logout', 'App/controllers/Logout.php');
$router->get('add', 'App/controllers/Add.php');
$router->get('remove', 'App/controllers/Remove.php');
$router->post('comment', 'App/controllers/Comment.php');
$router->get('statistics', 'App/controllers/statistics.php');
$router->get('404', 'App/controllers/404.php');
