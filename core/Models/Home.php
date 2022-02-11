<?php

namespace Models;

class Home extends AbstractModel

{
    // Name of the SQL table which will be used in the SQL
    // for requests
    protected string $tableName = "SQL Table Name";

    // here there should be private properties of the object
    // Private properties are the same name as the table columns


    // Here there should be an ID getter
    // Then for each of the private properties set above, there needs to be
    // a getter and a setter
    // WARNING = there are no SETTER for the ID
    // !!!An ID is never changed!!!

    /*
    public function getId()
    {
        return $this->id;
    }

    */


    // Here there should be all the different functions which will 
    // interact with the database, such as:
    // findAll() to get all the data of a table
    // findById() to get one data in the table using its Id
    // save() needs to be created as well because tables have different columns
    // edit() to enable the modification of a data
    // delete() in order to remove one data from the table

    /**
     * Ex for save:
     * Save() will take as parameter an object class
     * It could be "Artist" where the $tableName above would be = "artists"
     * as it would be in the database
     * 
     * then, as properties there will be things such as
     * "name", "stage name", "birthday"
     * 
     * then, there will be setters and getters for each of them
     * 
     * then, there will be the different functions to interact with the database such as
     * 
     * the function will take as parameter the object class which was prevviously
     * declared of course, as explained just earlier
     * 
     * public function save(Artist $artist)
     * {
     *  $sql = $this->pdo->prepare("SELECT * FROM {$this->tableName}");
     *  $sql->execute([
     *      "tableName" => $this->propertyName,
     * ])
     * }
     */

}

?>