<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints\NotBlank;

class ClientRequest
{
    #[NotBlank]
    public string $firstName;
    #[NotBlank]
    public string $lastName;
    #[NotBlank]
    public string $phoneNumber;
    #[NotBlank]
    public string $email;
    #[NotBlank]
    public string $address;
}