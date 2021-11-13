<?php namespace App;

/**
 * Class for managing favourite countries
 */ 

class Favourite implements Saveable
{
    private $id;
    private $userId;
    private $country;
    private static $table = 'favourites';

    public function __construct($id, $userId, $country)
    {
        $this->id = $id;
        $this->userId = $userId;
        $this->country = $country;
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
            'userId',
            'country'
        ];
    }

    //Retrive content of columns
    public function getContent()
    {
        return [
            $this->id,
            $this->userId,
            $this->country
        ];
    }
}
