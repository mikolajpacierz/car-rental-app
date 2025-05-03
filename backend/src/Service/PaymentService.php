<?php

namespace App\Service;

use App\DTO\PaymentRequest;
use App\DTO\PaymentResponse;
use App\Entity\Payment;
use App\Repository\PaymentRepository;
use Doctrine\ORM\EntityManagerInterface;

class PaymentService
{   
    private PaymentRepository $paymentRepository;
    private EntityManagerInterface $entityManager;
    
    public function __construct(PaymentRepository $paymentRepository, EntityManagerInterface $entityManager)
    {
        $this->paymentRepository = $paymentRepository;
        $this->entityManager = $entityManager;
    }

    public function addPayment(PaymentRequest $paymentRequest): PaymentResponse {
        $payment = new Payment();
        $payment->setReservation($paymentRequest->reservation);
        $payment->setAmount($paymentRequest->amount);
        
        $this->entityManager->persist($payment);
        $this->entityManager->flush();
        
        return PaymentResponse::fromEntity($payment);
    }
    
    public function getPayment(int $id): PaymentResponse {
        $payment = $this->paymentRepository->findOneBy(['id' => $id]);
        return PaymentResponse::fromEntity($payment);
    }
    
    public function getPayments(): array {
        $payments = $this->paymentRepository->findAll();
        return array_map(function (Payment $payment) {
            return PaymentResponse::fromEntity($payment);
        }, $payments);
    }
}