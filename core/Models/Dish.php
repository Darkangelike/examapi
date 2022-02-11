<?php

namespace Models;

use JetBrains\PhpStorm\Internal\TentativeType;

class Dish extends AbstractModel implements \JsonSerializable
{
    protected string $tableName = "dishes";
    private string $description;
    private int $price;
    private int $restaurant_id;


    /* SETTERS AND GETTERS */

    public function getId(): int{
        return $this->id;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getRestaurantId(): int
    {
        return $this->restaurant_id;
    }

    /**
     * @param int $restaurant_id
     */
    public function setRestaurantId(int $restaurant_id): void
    {
        $this->restaurant_id = $restaurant_id;
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize()
    {
        return [
            "id" => $this->id,
            "description" => $this->description,
            "price" => $this->price,
            "restaurant_id" => $this->restaurant_id
        ];
    }

    public function findAllByRestaurantId(int $restaurant_id): array {
        {
            $sql = $this->pdo->prepare("SELECT * FROM {$this->tableName} WHERE restaurant_id = : restaurant_id");
            $sql->execute([
                "restaurant_id" => $restaurant_id
            ]);
            $elements = $sql->fetchAll(\PDO::FETCH_CLASS, get_class($this));
            return $elements;
        }
    }
}