<?php

namespace App\Repositories;

use App\Models\Account;
use App\Repositories\Contracts\AccountRepositoryInterface;

class AccountRepository implements AccountRepositoryInterface
{
    protected $entity;

    public function __construct(Account $account)
    {
        $this->entity = $account;
    }

    public function getAccounts()
    {
        return $this->entity->all();
    }

    public function getAccountByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->first();
    }

    public function createNewAccount(array $request)
    {
        return $this->entity->create($request);
    }

    public function updateNewAccount(array $request, string $uuid)
    {
        if(!$bank = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);

        $bank->update($request);

        return $bank;
    }

    public function deleteAccount(string $uuid)
    {
        if(!$bank = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);

        $bank->delete();

        return response()->json([], 200);
    }
}