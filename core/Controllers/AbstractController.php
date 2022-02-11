<?php

namespace Controllers;

abstract class AbstractController
{
    protected object $defaultModel;
    protected $defaultModelName;

    public function __construct()
    {
        $this->defaultModel = new $this->defaultModelName();
    }

    /**
     * Displays a page using different html templates and an array of data
     *
     * @param string $template
     * @param array $donnees
     *
     */
    public function render(string $template, array $donnees)
    {
        return \App\View::render($template, $donnees);
    }

    /**
     * Redirect to the given $url in parameter
     *
     * @param array $parameters
     *
     * @return \App\Response
     */
    public function redirect(?array $parameters = null): \App\Response
    {
        return \App\Response::redirect($parameters);
    }


    /**
     *
     * Return a User or a false boolean if not found
     *
     *
     * @return false|User
     */
    public function getUser()
    {
        return \Models\user::getUser();
    }

    public function json($infoToReturn, ?string $specialMethod = null){
        return \App\Response::json($infoToReturn, $specialMethod);
    }

    public function get(string $dataType, array $requestBodyParams){
        return \App\Request::get($dataType,$requestBodyParams);
    }

    public function post(string $dataType, array $requestBodyParams){
        return \App\Request::post($dataType,$requestBodyParams);
    }
    public function delete(string $dataType, array $requestBodyParams){
        return \App\Request::delete($dataType,$requestBodyParams);
    }
    public function put(string $dataType, array $requestBodyParams){
        return \App\Request::put($dataType,$requestBodyParams);
    }


}
?>