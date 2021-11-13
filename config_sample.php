<?php

return [
    'database' => [
        'name' => 'your_db', // enter your database name
        'username' => 'your_db_username', // enter your database username
        'password' => 'your_db_password', // enter your password or leave '' if you do not use a password
        'connection' => 'mysql:host=127.0.0.1', //if you are using a different IP for localhost change this address
        'options' => [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //as of PHP 8.0 this is the default all prior versions has ERRMODE_SILENT as default
        ]
        ],
    'api' => 'https://restcountries.com/v3.1/all',
    'LOG_PATH' => './logs'
];
