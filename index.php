<?php

require 'vendor/autoload.php';
require 'bootstrap.php';

require Router::load('routes.php')
    ->direct(Request::getUri(), Request::getMethod());
