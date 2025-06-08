<?php

namespace App\DTO;

use DateTimeImmutable;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class UserRequest
{
    #[NotBlank]
    #[Email]
    public string $email;
    #[NotBlank]
    #[Length(min: 6)]
    public string $password;
    #[NotBlank]
    public string $firstName;
    #[NotBlank]
    public string $lastName;
    #[NotBlank]
    #[Length(min: 9, max: 9)]
    public string $phoneNumber;
    #[NotBlank]
    public string $address;
    public ?DateTimeImmutable $createdAt;
}