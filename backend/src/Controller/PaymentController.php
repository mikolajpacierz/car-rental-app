<?php

namespace App\Controller;

use App\DTO\PaymentRequest;
use App\Service\PaymentService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class PaymentController extends AbstractController
{
    private PaymentService $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    #[Route('/payments/new', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $paymentRequest = new PaymentRequest();
        $paymentRequest->reservation = $data['reservation'];
        $paymentRequest->amount = $data['amount'];
        $paymentRequest->method = $data['method'];
        $paymentRequest->date = $data['date'];

        $payment = $this->paymentService->addPayment($paymentRequest);
        return $this->json($payment, 201);
    }

    #[Route('/payments/{id}', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $payment = $this->paymentService->getPayment($id);
        return $this->json($payment, 200);
    }

    #[Route('/payments', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $payments = $this->paymentService->getPayments();
        return $this->json($payments, 200);
    }
}