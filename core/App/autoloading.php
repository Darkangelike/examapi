<?php


// Enables the framework to automatically do a require_once of a file whenever
// its class is used in the code

spl_autoload_register(
    function($className)
    {
        $className = str_replace("\\", "/", $className);
        require_once "core/{$className}.php";
    }

);

?>