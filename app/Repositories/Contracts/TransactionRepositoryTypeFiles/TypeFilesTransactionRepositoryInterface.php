<?php

namespace App\Repositories\Contracts\TransactionRepositoryTypeFiles;
use Illuminate\Http\Request;

interface TypeFilesTransactionRepositoryInterface
{
    // public function createTransactions(string $pathFile);
    public function restrictTransactions(string $pathFile);
    public function deleteFileTransaction();
    public function removePatterns();
}