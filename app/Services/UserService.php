<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{
    protected $repository;
    
    public function __construct(UserRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getUsers()
    {
        return $this->repository->getUsers();
    }

    public function getUserByUuid(string $uuid)
    {
        return $this->repository->getUserByUuid($uuid);
    }

    public function createNewUser(array $request)
    {
        return $this->repository->createNewUser($request);
    }
    
    public function updateUser(array $request, string $uuid)
    {
        return $this->repository->updateUser($request, $uuid);
    }
    
    public function deleteUser(string $uuid)
    {
        return $this->repository->deleteUser($uuid);
    }
}