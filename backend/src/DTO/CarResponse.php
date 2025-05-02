<?php

namespace App\DTO;

use App\Entity\Car;

class CarResponse
{
    public int $id;
    public string $brand;
    public string $model;
    public int $year;
    public string $color;

    public static function fromEntity(Car $car): self
    {
        $carResponse = new self();
        $carResponse->id = $car->getId();
        $carResponse->brand = $car->getBrand();
        $carResponse->model = $car->getModel();
        $carResponse->year = $car->getYear();
        $carResponse->color = $car->getColor();

        return $carResponse;
    }
}