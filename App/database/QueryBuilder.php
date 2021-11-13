<?php namespace App;

/*
Class that can be instanced to
make querries to the database
*/

class QueryBuilder
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    /**
     * Checks credentials for user login
     *
     * @param  $table     is the tablename
     * @param  $username  is the username input
     * @param  $passworrd is the password input
     * @return $message 
     */
    public function login($table, $username, $password)
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE username=:username OR email=:username LIMIT 1");

            $statement->bindParam(":username", $username);
            $statement->execute();
            
            $returned_row = $statement->fetch(\PDO::FETCH_ASSOC);
            $user = new User($returned_row['id'], $returned_row['email'], $returned_row['username'], $returned_row['password']);
            if (($statement->rowCount() > 0) && ($password == $returned_row['password'])) {
                $_SESSION['user_session'] = $returned_row['id'];
                $_SESSION['username'] = $returned_row['username'];
                return [
                    'user' => $user,
                    'status' => true
                ];
            } 
            $message =  'Incorrect credentials!';
            return [
                'message' => $message,
                'status' => false
            ];
        
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }
    /**
     * Add countries to favoutite coutries
     *
     * @param  $table   is the tablename
     * @param  $userId  is the loggedin user
     * @param  $country is the country to be added
     * @return $message or status
     */
    public function addFavourite($table, $userId, $country)
    {
        $favourites = $this->getFavourites($table, $userId);
        //Check if favourites already are added
        if (isset($favourites) && $favourites !== []) 
        {
            foreach ($favourites as $countries) 
            {
                //Check if country is already on the list / avoid dupliates
                if ($countries['country'] != $country) {
                    try {
                        $statement = $this->pdo->prepare("INSERT INTO {$table}(userId, country) VALUES(:userId, :country)");

                        $statement->bindParam(":userId", $userId);
                        $statement->bindParam(":country", $country);

                        $statement->execute();
                    
                    } catch(\PDOException $e) {
                        $e->getMessage();
                    }
                } else 
                {
                    return [
                        'message' => 'Country already added!',
                        'status' => false
                    ];
                }
            }
        } else 
        {
            //If favourites list is empty no need for checking for duplicates
            try {
                $statement = $this->pdo->prepare("INSERT INTO {$table}(userId, country) VALUES(:userId, :country)");

                $statement->bindParam(":userId", $userId);
                $statement->bindParam(":country", $country);

                $statement->execute();
            
            } catch(\PDOException $e) {
                $e->getMessage();
            }
        }
    }
    /**
     * Remove countries to favoutite coutries
     *
     * @param $table   is the tablename
     * @param $userId  is the loggedin user
     * @param $country is the country to be removed
     */
    public function removeFavourite($table, $userId, $country)
    {
        try {
            $statement = $this->pdo->prepare("DELETE FROM {$table} WHERE userId=:userId AND country=:country");

            $statement->bindParam(":userId", $userId);
            $statement->bindParam(":country", $country);

            $statement->execute();
        
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }
    /**
     * Retreives favoutite coutries
     *
     * @param  $table  is the tablename
     * @param  $userId is the loggedin user
     * @return $favouries
     */
    public function getFavourites($table, $userId)
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM {$table} WHERE userId=:userId");

            $statement->bindParam(":userId", $userId);
            $statement->execute();
            $favourites = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $favourites;
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }
    /**
     * Add comment to favoutite coutries
     *
     * @param $table       is the tablename
     * @param $favouriteId is the country selected
     * @param $comment     is the input comment
     */
    public function setComment($table, $favouriteId, $comment)
    {
        try {
            $statement = $this->pdo->prepare("INSERT INTO {$table}(favouriteId, comment) VALUES(:favouriteId, :comment)");

            $statement->bindParam(":favouriteId", $favouriteId);
            $statement->bindParam(":comment", $comment);

            $statement->execute();
        
        } catch(\PDOException $e) {
            $e->getMessage();
        }

    }
    /**
     * Retreive all comments to favoutite coutries
     *
     * @param  $table   is the tablename
     * @param  $userId  is the loggedin user
     * @param  $comment is the input comment
     * @return $favourites with comments
     */
    public function getComments($table, $userId)
    {
        try {
            $statement = $this->pdo->prepare("SELECT * FROM favourites LEFT OUTER JOIN {$table} ON favourites.id=$table.favouriteId WHERE userId=:userId");

            $statement->bindParam(":userId", $userId);
            $statement->execute();
            $favourites = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $favourites;
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }
        /**
     * Retreive all favoutite 
     * coutries and number of users they 
     * are favourite to
     *
     */
    public function getAllFavourites()
    {
        try {
            $statement = $this->pdo->prepare("SELECT country, count(id) AS c FROM favourites GROUP BY country LIMIT 7");

            $statement->execute();

            $data = [];
            for ($x = 0; $x < $statement->rowCount(); $x++) {
                $data[] = $statement->fetch(\PDO::FETCH_ASSOC);
            }

            foreach ($data as $country) {
                $count[] = $country['c'];
                $favCountry[] = $country['country'];
            }
            return [
                'country' => $favCountry,
                'count' => $count
            ];
        } catch(\PDOException $e) {
            $e->getMessage();
        }
    }
}
