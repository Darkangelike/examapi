<?php

namespace Controllers;

class Home extends AbstractController

{
    protected $defaultModelName = \Models\Home::class;

    /**
     * 
     * Displays the home page
     * 
     * To call this method, the Kernel is constantly surveilling the URL
     * for both "type" and "action" parameters
     * 
     * "Type" handles the controller class name (where we are here)
     * "action" is the method name to be called here it will be index below
     * 
     * The output will look like something such as
     * 
     * "localhost/baseFramework.php?type=home&action=index&"
     * 
     * There also needs to be an php file located at the place where
     * the first argument in the render function below points at
     * (in this situation here, it should be in "home/index")
     */
    public function index()
    {

        // Here, we are interacting with the data in the database
        // using methods called from the model

        // There can either be no return if this function only does a redirect at the end
        // Otherwise there will be a RETURN with a render
        // To display a page

        // If rendering, there must be a path location where there is a HTML code to be inserted in the body of the page layout
        // Then as second argument, there is an array of associative keys
        // There must be at least one value "pageTitle" which will be the page title name displayed in the browser
        // THen all other values will be reused in the html code using php, located in the first parameter







        return $this->render("home/index", [
            "pageTitle" => "Home Page",
            // "elements" => $elements
        ]);
    }
}

?>