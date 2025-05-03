<?php

namespace App\DTO;

use App\Entity\Reservation;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class PaymentRequest
{
    #[NotBlank]
    public Reservation $reservation;
    #[NotBlank]
    public float $amount;
    #[NotBlank]
    public string $method;
    #[NotBlank]
    public ?DateTimeInterface $date;
}