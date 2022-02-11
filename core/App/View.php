<?php

namespace App;

class View
{
        
    /**
     * Renders a web page from a template and datas given
     * 
     * @param string $nomDeTemplate
     * @param array $donnees
     * 
     * @return void
     */
    public static function render(string $nomDeTemplate, array $donnees):void {

        ob_start();
        extract($donnees);

        require_once "templates/{$nomDeTemplate}.html.php";
        $pageContent = ob_get_clean();

        ob_start();
        require_once "templates/layout.html.php";
        echo ob_get_clean();
    }

}

?>