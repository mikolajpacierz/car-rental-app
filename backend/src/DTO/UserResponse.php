<?php

namespace App\DTO;

use App\Entity\User;
use DateTimeInterface;

class UserResponse
{
    public int $id;
    public string $email;
    public string $firstName;
    public string $lastName;
    public string $phoneNumber;
    public string $address;
    public ?DateTimeInterface $createdAt;

    public static function fromEntity(User $user): self
    {
        $userResponse = new self();
        $userResponse->id = $user->getId();
        $userResponse->email = $user->getEmail();
        $userResponse->firstName = $user->getFirstName();
        $userResponse->lastName = $user->getLastName();
        $userResponse->phoneNumber = $user->getPhoneNumber();
        $userResponse->address = $user->getAddress();
        $userResponse->createdAt = $user->getCreatedAt();

        return $userResponse;
    }
}