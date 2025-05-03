<?php

namespace App\Entity;

use App\Repository\PaymentRepository;
use DateTimeInterface;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\OneToOne;

#[Entity(repositoryClass: PaymentRepository::class)]
class Payment
{
    #[Id]
    #[GeneratedValue]
    #[Column]
    private int $id;
    #[OneToOne(targetEntity: Reservation::class, inversedBy: "payment")]
    #[JoinColumn(name: "reservation_id", referencedColumnName: "id", nullable: false)]
    private Reservation $reservation;
    #[Column]
    private float $amount;
    #[Column]
    private string $method;
    #[Column]
    private ?DateTimeInterface $date;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getReservation(): Reservation
    {
        return $this->reservation;
    }

    public function setReservation(Reservation $reservation): void
    {
        $this->reservation = $reservation;
    }

    public function getAmount(): float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): void
    {
        $this->amount = $amount;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    public function getDate(): ?DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?DateTimeInterface $date): void
    {
        $this->date = $date;
    }
    
    
}