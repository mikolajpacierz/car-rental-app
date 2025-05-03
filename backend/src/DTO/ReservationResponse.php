<?php

namespace App\DTO;

use App\Entity\Payment;
use App\Entity\Reservation;
use DateTimeInterface;

class ReservationResponse
{
    public int $id;
    public Payment $payment;
    public ?DateTimeInterface $date;
    
    public static function fromEntity(Reservation $reservation): self {
        $reservationResponse = new self();
        $reservationResponse->id = $reservation->getId();
        $reservationResponse->payment = $reservation->getPayment();
        $reservationResponse->date = $reservation->getDate();
        
        return $reservationResponse;
    }
}