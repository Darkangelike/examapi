<?php

namespace Database;

class PdoMySQL
{

    public static $instance = null;

    /**
     * Return a PDO object to interact with the database
     * To use the PDO methods, we will need to do
     * $this->pdo-><PDOmethodName>
     * 
     * @return \PDO
     * 
     * !!! remember to change the database name, username, and the password !!!
     */
    public static function getPdo():\PDO
    {
        if (self::$instance === null)
        {
            self::$instance = new \PDO ("mysql:host=localhost;dbname=DATABASENAME;charset=utf8", "ADMINNAME", "PASSWORD", [
                \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ
            ]);
        }

    return self::$instance;

    }
}