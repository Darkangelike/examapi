<?php

namespace App;

class Kernel {

    /**
     * Always monitors the URL for both "type" and "action" parameters
     * by default the KERNEL will redirect to the page the two first initialised parameters points at
     * otherwise, if the values are different in the URL
     * The kernel will direct to there
     */
    public static function run():void
    {
        // default redirect location
        $type = "home";
        $action = "index";
        
        // otherwise if in the URL there are other values
        // set "type" and "action" to those in the url
        if(!empty($_GET["type"])) { $type = $_GET["type"];}
        if(!empty($_GET["action"])) { $action = $_GET["action"];}

        // transforms the first letter of type into a capital letter
        // since the file names in the framework are in PascalCase
        $type = ucfirst($type);

        $typeName = "\Controllers\\" . $type;

        $controller = new $typeName();
        $controller->$action();
    }
}

?>