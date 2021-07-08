<?php

namespace App\Services;

use App\Repositories\Contracts\AccountRepositoryInterface;

class AccountService
{
    protected $repository;

    public function __construct(AccountRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getAccounts()
    {
        return $this->repository->getAccounts();
    }
    
    public function getAccountByUuid(string $uuid)
    {
        return $this->repository->getAccountByUuid($uuid);
    }

    public function createNewAccount(array $request)
    {
        return $this->repository->createNewAccount($request);
    }

    public function updateNewAccount(array $request, string $uuid)
    {
        return $this->repository->updateNewAccount($request, $uuid);
    }

    public function deleteAccount(string $uuid)
    {
        return $this->repository->deleteAccount($uuid);
    }
}