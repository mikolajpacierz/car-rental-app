<?php

namespace App\Service;

use App\DTO\UserRequest;
use App\DTO\UserResponse;
use App\Entity\User;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserService
{
    private UserRepository $userRepository;
    private EntityManagerInterface $entityManager;
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserRepository $userRepository, EntityManagerInterface $entityManager, UserPasswordHasherInterface $passwordHasher)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
        $this->passwordHasher = $passwordHasher;
    }
    
    public function addUser(UserRequest $userRequest): UserResponse
    {
        $user = new User();
        $user->setEmail($userRequest->email);
        $user->setPassword($this->passwordHasher->hashPassword($user, $userRequest->password));
        $user->setFirstName($userRequest->firstName);
        $user->setLastName($userRequest->lastName);
        $user->setPhoneNumber($userRequest->phoneNumber);
        $user->setAddress($userRequest->address);
        $user->setCreatedAt($userRequest->createdAt);

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        return UserResponse::fromEntity($user);
    }

    public function getUser(int $id): UserResponse
    {
        $user = $this->userRepository->findOneBy(['id' => $id]);
        return UserResponse::fromEntity($user);
    }

    public function getUsers(): array
    {
        $users = $this->userRepository->findAll();
        return array_map(function (User $user) {
            return UserResponse::fromEntity($user);
        }, $users);
    }
}