<?php

namespace App\Controller;

use App\Entity\Car;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class CarController extends AbstractController
{
    #[Route('/cars', name: 'create_car')]
    public function create(EntityManagerInterface $entityManager): Response {
        $car = new Car();
        $car->setBrand('Skoda');
        $car->setModel('Fabia');
        $car->setYear(2004);
        $car->setColor('Silver');

        $entityManager->persist($car);

        $entityManager->flush();

        return new Response('Saved new product with id '.$car->getId());
    }

    #[Route('/cars/{id}', name: 'show_car')]
    public function show(EntityManagerInterface $entityManager, int $id): Response {
        $car = $entityManager->getRepository(Car::class)->find($id);

        if (!$car) {
            throw $this->createNotFoundException('Car not found');
        }

        return new Response('Show car: '.$car->getId());
    }
}