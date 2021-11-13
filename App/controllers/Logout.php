<?php

/*
Controller handling 
login out and session end
*/

if (isset($_GET['logout']) && ($_GET['logout'] == 'true')) {
    session_destroy();
    unset($_SESSION['user_session']);
    header("Location: /");
}
