<?php

namespace App\DTO;

use DateTimeInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserRequest
{
    #[NotBlank]
    public string $email;
    #[NotBlank]
    public string $password;
    #[NotBlank]
    public string $firstName;
    #[NotBlank]
    public string $lastName;
    #[NotBlank]
    public string $phoneNumber;
    #[NotBlank]
    public string $address;
    public ?DateTimeInterface $createdAt;
}