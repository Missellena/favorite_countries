<?php

/*
Controller handling 
saving of comments
*/

$favourite = $_POST['id'];
$comment = trim($_POST['comment']);
$app['database']->setComment('comments', $favourite, $comment);
header('Location: /favourites');    
