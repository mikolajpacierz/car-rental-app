<?php

namespace App\Controller;

use App\DTO\CarRequest;
use App\Service\CarService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    private CarService $carService;

    public function __construct(CarService $carService)
    {
        $this->carService = $carService;
    }

    #[Route('/api/cars/new', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $carRequest = new CarRequest();
        $carRequest->brand = $data['brand'];
        $carRequest->model = $data['model'];
        $carRequest->year = $data['year'];
        $carRequest->color = $data['color'];

        $car = $this->carService->addCar($carRequest);
        return $this->json($car, 201);
    }

    #[Route('/api/cars/{id}', methods: ['GET'])]
    public function show($id): JsonResponse
    {
        $car = $this->carService->getCar($id);
        return $this->json($car, 200);
    }

    #[Route('/api/cars', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $cars = $this->carService->getCars();
        return $this->json($cars, 200);
    }
}