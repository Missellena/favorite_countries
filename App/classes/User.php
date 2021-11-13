<?php namespace App;

/**
 * Class for managing users
 */

class User
{
    private $id;
    private $email;
    private $username;
    private $password;
    private static $table = 'users';

    public function __construct($id, $email, $username, $password)
    {
        $this->id = $id;
        $this->email = $email;
        $this->username = $username;
        $this->password = $password; 
    }

    public function getId()
    {
        return $this->id;
    }

    //Retrive table name
    public function getTable()
    {
        return self::$table;
    }

    //Retreive columns in database
    public function getColumns()
    {
        return [
            'id',
            'email',
            'username',
            'password'
        ];
    }

    //Retrive content of columns
    public function getContent()
    {
        return [
            $this->id,
            $this->email,
            $this->username,
            $this->password
        ];
    }
}