<?php 

session_start();

$app = [];
$app['config'] = require 'config.php';

require 'App/config/Router.php';
require 'App/config/Request.php';
require 'App/database/Connection.php';
require 'App/database/QueryBuilder.php';
require 'App/classes/User.php';
require 'App/config/Log.php';
require 'App/config/Logger.php';

$app['database'] = new App\QueryBuilder(
    App\Connection::make($app['config']['database'])
);


$LOG_PATH = \Log::get('LOG_PATH', '');
Logger::enableSystemLogs();
$logger = Logger::getInstance();
