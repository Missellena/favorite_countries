<?php namespace App;

/**
 * Class for managing comments
 */ 

class Comment implements Saveable
{
    private $id;
    private $favouriteId;
    private $comment;
    private $created_at;
    private static $table = 'comments';

    public function __construct($id, $favouriteId, $comment, $created_at)
    {
        $this->id = $id;
        $this->favouriteId = $favouriteId;
        $this->comment = $comment;
        $this->password = $created_at; 
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
            'favouriteId',
            'comment',
            'created_at'
        ];
    }

    //Retrive content of columns
    public function getContent()
    {
        return [
            $this->id,
            $this->favouriteId,
            $this->comment,
            $this->created_at
        ];
    }
}
