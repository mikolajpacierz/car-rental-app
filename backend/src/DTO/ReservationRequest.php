<?php

namespace App\DTO;

use App\Entity\Payment;
use DateTimeInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class ReservationRequest
{
    #[NotBlank]
    public Payment $payment;
    #[NotBlank]
    public ?DateTimeInterface $date;
}