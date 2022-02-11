<?php

namespace Controllers;

class Restaurant extends AbstractController
{
    protected $defaultModelName = \Models\Restaurant::class;


    /**
     * Returns all the elements from the restaurant table
     * @return void
     */
    public function index(){
        return $this->json($this->defaultModel->findAll());
    }

    /**
     * Checks if the new restaurant input is valid
     * Saves it in the database
     * If the restaurant input is incorrect, displays an error message
     * @return void
     */
    public function new(){
        $request = $this->post("json", [
            "name" => "text",
            "address" => "text",
            "city" => "text"]);

        if (!$request){
            return $this->json("Input is incorrect.");
        }

        $restaurant = new \Models\Restaurant();
        $restaurant->setName($request["name"]);
        $restaurant->setAddress($request["address"]);
        $restaurant->setCity($request["city"]);

        $this->defaultModel->save($restaurant);
        return $this->json("The restaurant was successfully added.");

    }

    /**
     * @return void
     */
    public function suppr(){
        $request = $this->delete("json", [
            "id" => "number"
        ]);

        if (!$request){
            return $this->json("Incorrect input", "delete");
        }

        $restaurant = $this->defaultModel->findById($request["id"]);

        if (!$restaurant){
            return $this->json("The restaurant does not exist.", "delete");
        }

        $this->defaultModel->remove($restaurant->getId());
        return $this->json("The restaurant was successfully deleted.", "delete");
    }

    public function show(){
        $request = $this->get("json", [
            "id" => "number"
        ]);

        if (!$request){
            return $this->json("Incorrect input", "delete");
        }

        $restaurant = $this->defaultModel->findById($request["id"]);

        if (!$restaurant){
            return $this->json("The restaurant does not exist.", "delete");
        }

        return $this->json($restaurant);
    }
}