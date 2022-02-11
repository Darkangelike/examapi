<?php

namespace App;

class Response
{

    /**
     *
     * @param $infoToReturn
     * @return void
     */
    public static function json($infoToReturn, ?string $specialMethod = null)
    {
        header('Access-Control-Allow-Headers: *');
        header('Access-Control-Allow-Origin: *');
        if ($specialMethod == "delete") {
            header('Access-Control-Allow-Methods: DELETE');
        } else if ($specialMethod == "put"){
            header('Access-Control-Allow-Methods: PUT');
        }
        echo json_encode($infoToReturn);
    }


    /**
     * Redirect the page towards an url created using an array with its keys and values
     * 
     * @param array $parameters
     * 
     * @return void
     */
    public static function redirect(?array $parameters = null): void
    {

        $url = "index.php";

        if ($parameters) {
            $url = "?";
            foreach ($parameters as $key => $value) {
                $url .= $key . "=" . $value . "&";
            }
        }

        header("Location: " . $url);
        exit();
    }
}
?>