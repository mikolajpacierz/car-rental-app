<?php

namespace App\DTO;

use App\Entity\Client;

class ClientResponse
{
    public int $id;
    public string $firstName;
    public string $lastName;
    public string $phoneNumber;
    public string $email;
    public string $address;

    public static function fromEntity(Client $client): self
    {
        $clientResponse = new self();
        $clientResponse->id = $client->getId();
        $clientResponse->firstName = $client->getFirstName();
        $clientResponse->lastName = $client->getLastName();
        $clientResponse->phoneNumber = $client->getPhoneNumber();
        $clientResponse->email = $client->getEmail();
        $clientResponse->address = $client->getAddress();

        return $clientResponse;
    }
}