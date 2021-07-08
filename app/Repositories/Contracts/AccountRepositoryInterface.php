<?php

namespace App\Repositories\Contracts;

interface AccountRepositoryInterface
{
    public function getAccounts();
    public function getAccountByUuid(string $uuid);
    public function createNewAccount(array $request);
    public function updateNewAccount(array $request, string $uuid);
    public function deleteAccount(string $uuid);
}