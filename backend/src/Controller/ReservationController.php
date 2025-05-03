<?php

namespace App\Controller;

use App\DTO\ReservationRequest;
use App\Entity\Reservation;
use App\Service\PaymentService;
use App\Service\ReservationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class ReservationController extends AbstractController
{
    private ReservationService $reservationService;

    public function __construct(ReservationService $reservationService)
    {
        $this->reservationService = $reservationService;
    }


    #[Route('/reservations/new', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $reservationRequest = new ReservationRequest();
        $reservationRequest->payment = $data['payment'];
        $reservationRequest->date = $data['date'];

        $reservation = $this->reservationService->addReservation($reservationRequest);
        return $this->json($reservation, 201);
    }

    #[Route('/reservations/{id}', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $reservation = $this->reservationService->getReservation($id);
        return $this->json($reservation, 200);
    }

    #[Route('/reservations', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $reservations = $this->reservationService->getReservations();
        return $this->json($reservations, 200);
    }
}