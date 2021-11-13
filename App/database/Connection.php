<?php namespace App;

/**
 * @file
 * Class enabling the connection
 * to the database
 */

class Connection
{
    /**
     * Instances a connection to the database 
     */

    public static function make($config)
    {
        try {
            return new \PDO(
                $config['connection'].';dbname='.$config['name'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch (\PDOException $e) {
            die('Cannot connect to the database - '.$e->getMessage());
        }
    }
}