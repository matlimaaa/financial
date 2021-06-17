<?php

namespace App\Repositories\Contracts;

interface BankRepositoryInterface
{
    public function getBanks();
    public function getBankByUuid(string $uuid);
    public function createNewBank(array $request);
    public function updateNewBank(array $request, string $uuid);
    public function deleteBank(string $uuid);
}