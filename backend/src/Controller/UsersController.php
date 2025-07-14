<?php

namespace App\Controller;

use App\DTO\UserRequest;
use App\Service\UserService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;

class UsersController extends AbstractController
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    #[Route('/api/users/new', methods: ['POST'])]
    public function create(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);

        $userRequest = new UserRequest();
        $userRequest->email = $data['email'];
        $userRequest->password = $data['password'];
        $userRequest->firstName = $data['firstName'];
        $userRequest->lastName = $data['lastName'];
        $userRequest->phoneNumber = $data['phoneNumber'];
        $userRequest->address = $data['address'];

        $user = $this->userService->addUser($userRequest);
        return $this->json($user, 201);
    }

    #[Route('/api/users/{id}', methods: ['GET'])]
    public function show(int $id): JsonResponse
    {
        $user = $this->userService->getUser($id);
        return $this->json($user, 200);
    }

    #[Route('/api/users', methods: ['GET'])]
    public function index(): JsonResponse
    {
        $users = $this->userService->getUsers();
        return $this->json($users, 200);
    }
}