<?php

namespace App\Services;

use App\Repositories\Contracts\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class TransactionService
{
    protected $repository;

    public function __construct(TransactionRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function getTransactions()
    {
        return $this->repository->getTransactions();
    }
    
    public function getTransactionByUuid(string $uuid)
    {
        return $this->repository->getTransactionByUuid($uuid);
    }

    public function createNewTransaction(array $request)
    {
        return $this->repository->createNewTransaction($request);
    }

    public function updateTransaction(array $request, string $uuid)
    {
        return $this->repository->updateTransaction($request, $uuid);
    }

    public function deleteTransaction(string $uuid)
    {
        return $this->repository->deleteTransaction($uuid);
    }

    public function uploadTransactions(Request $request)
    {
        return $this->repository->uploadTransactions($request);
    }
}