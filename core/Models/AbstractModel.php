<?php

namespace Models;

use stdClass;

require_once "core/Database/PdoMySQL.php";

abstract class AbstractModel
{
    protected $pdo;
    protected string $tableName;

    public function __construct()
    {
        $this->pdo = \Database\PdoMySQL::getPdo();
    }

/**
 * Find an element using its id in the "$this->tableName" table in the database
 * Return an array containing only one element
 * 
 * @param integer $id
 */
public function findById(int $id)
{
    $sql = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE id = :id");
    $sql->execute(
        [
        "id" => $id
    ]
    );
    $sql->setFetchMode(\PDO::FETCH_CLASS, get_class($this));
    $element = $sql->fetch();
    return $element;
}

/**
 * Returns an array of all the elements
 * all the fields in the sql table {$this->tableName}
 * 
 * @return array $elements 
 */
public function findAll():array
{
    $sql = $this->pdo->query("SELECT * FROM {$this->tableName}");
    $elements = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));
    return $elements;
}

/**
 * delete an element from the table using its associated ID
 * 
 * @param integer $id
 * 
 */
public function remove(int $id):void
{
    $deleteRequest = $this->pdo->prepare("DELETE FROM {$this->tableName} WHERE id=:id");
    $deleteRequest->execute(
        [
            "id" => $id
        ]
        );
}

/*
public function findByColumnName($columnName)
{
    $sql = $this->pdo->per
}
*/

}

?>