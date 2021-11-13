<?php

/*
Controller handling 
login validation
*/

if (isset($_POST['login'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $result = $app['database']->login('users', $username, $password);
    header("Location: /?result=".$result['message']); 
}
