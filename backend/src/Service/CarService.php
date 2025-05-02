<?php

namespace App\Service;

use App\DTO\CarRequest;
use App\DTO\CarResponse;
use App\Entity\Car;
use App\Repository\CarRepository;
use Doctrine\ORM\EntityManagerInterface;

class CarService
{
    private CarRepository $carRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(CarRepository $carRepository, EntityManagerInterface $entityManager)
    {
        $this->carRepository = $carRepository;
        $this->entityManager = $entityManager;
    }


    public function addCar(CarRequest $carRequest): CarResponse {
        $car = new Car();
        $car->setBrand($carRequest->brand);
        $car->setModel($carRequest->model);
        $car->setYear($carRequest->year);
        $car->setColor($carRequest->color);

        $this->entityManager->persist($car);
        $this->entityManager->flush();

        return CarResponse::fromEntity($car);
    }

    public function getCar(int $id): CarResponse {
        $car = $this->carRepository->findOneBy(['id' => $id]);
        return CarResponse::fromEntity($car);
    }

    public function getCars(): array {
        $cars = $this->carRepository->findAll();
        return array_map(function (Car $car) {
            return CarResponse::fromEntity($car);
        }, $cars);
    }
}