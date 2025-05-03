<?php

namespace App\Service;

use App\DTO\ReservationRequest;
use App\DTO\ReservationResponse;
use App\Entity\Reservation;
use App\Repository\ReservationRepository;
use Doctrine\ORM\EntityManagerInterface;

class ReservationService
{
    private ReservationRepository $reservationRepository;
    private EntityManagerInterface $entityManager;
    
    public function __construct(ReservationRepository $reservationRepository, EntityManagerInterface $entityManager)
    {
        $this->reservationRepository = $reservationRepository;
        $this->entityManager = $entityManager;
    }
    
    public function addReservation(ReservationRequest $reservationRequest): ReservationResponse {
        $reservation = new Reservation();
        $reservation->setPayment($reservationRequest->payment);
        $reservation->setDate($reservationRequest->date);
        
        $this->entityManager->persist($reservation);
        $this->entityManager->flush();
        
        return ReservationResponse::fromEntity($reservation);
    }
    
    public function getReservation(int $id): ReservationResponse {
        $reservation = $this->reservationRepository->findOneBy(['id' => $id]);
        return ReservationResponse::fromEntity($reservation);
    }
    
    public function getReservations(): array {
        $reservations = $this->reservationRepository->findAll();
        return array_map(function (Reservation $reservation) {
            return ReservationResponse::fromEntity($reservation);
        }, $reservations);
    }
    
    


}