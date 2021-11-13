<?php

/*
Controller handling api calls
*/

$result = $app['database']->getAllFavourites();
print_r($result);
