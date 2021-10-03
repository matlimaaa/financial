<?php

namespace App\Repositories\Contracts;
use Illuminate\Http\Request;

interface TransactionRepositoryInterface
{
    public function getTransactions();
    public function getTransactionByUuid(string $uuid);
    public function createNewTransaction(array $request);
    public function updateTransaction(array $request, string $uuid);
    public function deleteTransaction(string $uuid);
    public function uploadTransactions(Request $request);
    public function existsOrNew(array $records, string $pathFile);
}