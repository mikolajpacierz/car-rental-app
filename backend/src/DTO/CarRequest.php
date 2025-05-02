<?php

namespace App\DTO;

use Symfony\Component\Validator\Constraints\NotBlank;

class CarRequest
{
    #[NotBlank]
    public string $brand;
    #[NotBlank]
    public string $model;
    #[NotBlank]
    public int $year;
    #[NotBlank]
    public string $color;
}