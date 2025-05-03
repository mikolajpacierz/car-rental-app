<?php

namespace App\Controller;

use App\DTO\ClientRequest;
use App\Service\ClientService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class ClientController extends AbstractController
{
    private ClientService $clientService;

    public function __construct(ClientService $clientService)
    {
        $this->clientService = $clientService;
    }

    #[Route('/clients/new', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $clientRequest = new ClientRequest();
        $clientRequest->firstName = $data['firstName'];
        $clientRequest->lastName = $data['lastName'];
        $clientRequest->phoneNumber = $data['phoneNumber'];
        $clientRequest->email = $data['email'];
        $clientRequest->address = $data['address'];

        $client = $this->clientService->addClient($clientRequest);
        return $this->json($client, 201);
    }

    #[Route('/clients/{id}', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $client = $this->clientService->getClient($id);
        return $this->json($client, 200);
    }

    #[Route('/clients', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $clients = $this->clientService->getClients();
        return $this->json($clients, 200);
    }

}