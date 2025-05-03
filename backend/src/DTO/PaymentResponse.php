<?php

namespace App\DTO;

use App\Entity\Payment;
use App\Entity\Reservation;
use DateTimeInterface;

class PaymentResponse
{
    public int $id;
    public Reservation $reservation;
    public float $amount;
    public string $method;
    public ?DateTimeInterface $date;
    
    public static function fromEntity(Payment $payment): self {
        $paymentResponse = new self();
        $paymentResponse->id = $payment->getId();
        $paymentResponse->reservation = $payment->getReservation();
        $paymentResponse->amount = $payment->getAmount();
        $paymentResponse->method = $payment->getMethod();
        $paymentResponse->date = $payment->getDate();
        
        return $paymentResponse;
    }
}