<?php

namespace Models;

use JetBrains\PhpStorm\Internal\TentativeType;

class Restaurant extends AbstractModel implements \JsonSerializable
{
    protected string $tableName = "restaurants";
    private string $name;
    private string $address;
    private string $city;

    public function getId(): int{
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        $dish = new \Models\Dish();

        return [
            "id" => $this->id,
            "name" => $this->name,
            "address" => $this->address,
            "city" => $this->city
        ];
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    public function getDishes()
    {
        $modelDishes = new \Models\Dish();
        return $modelDishes->findAllByRestaurantId($this->getId());
    }

    public function save(Restaurant $restaurant){
        $sql = $this->pdo->prepare("INSERT INTO {$this->tableName} (name, address, city) VALUES (:name, :address, :city)");
        $sql->execute([
            "name" => $restaurant->name,
            "address" => $restaurant->address,
            "city" => $restaurant->city
        ]);

    }
}