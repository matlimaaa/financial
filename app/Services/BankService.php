<?php

namespace App\Services;

use App\Repositories\Contracts\BankRepositoryInterface;

class BankService
{
    protected $repository;

    public function __construct(BankRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getBanks()
    {
        return $this->repository->getBanks();
    }

    public function getBankByUuid(string $uuid)
    {
        return $this->repository->getBankByUuid($uuid);
    }

    public function createNewBank(array $request)
    {
        return $this->repository->createNewBank($request);
    }

    public function updateNewBank(array $request, string $uuid)
    {
        return $this->repository->updateNewBank($request, $uuid);
    }

    public function deleteBank(string $uuid)
    {
        return $this->repository->deleteBank($uuid);
    }
}