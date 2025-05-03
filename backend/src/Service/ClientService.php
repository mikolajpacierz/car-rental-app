<?php

namespace App\Service;

use App\DTO\ClientRequest;
use App\DTO\ClientResponse;
use App\Entity\Client;
use App\Repository\ClientRepository;
use Doctrine\ORM\EntityManagerInterface;

class ClientService
{
    private ClientRepository $clientRepository;
    private EntityManagerInterface $entityManager;

    public function __construct(ClientRepository $clientRepository, EntityManagerInterface $entityManager)
    {
        $this->clientRepository = $clientRepository;
        $this->entityManager = $entityManager;
    }

    public function addClient(ClientRequest $clientRequest): ClientResponse
    {
        $client = new Client();
        $client->setFirstName($clientRequest->firstName);
        $client->setLastName($clientRequest->lastName);
        $client->setPhoneNumber($clientRequest->phoneNumber);
        $client->setEmail($clientRequest->email);
        $client->setAddress($clientRequest->address);

        $this->entityManager->persist($client);
        $this->entityManager->flush();

        return ClientResponse::fromEntity($client);
    }

    public function getClient(int $id): ClientResponse
    {
        $client = $this->clientRepository->findOneBy(['id' => $id]);
        return ClientResponse::fromEntity($client);
    }

    public function getClients(): array
    {
        $clients = $this->clientRepository->findAll();
        return array_map(function (Client $client) {
            return ClientResponse::fromEntity($client);
        }, $clients);
    }
}