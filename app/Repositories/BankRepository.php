<?php

namespace App\Repositories;

use App\Models\Bank;
use App\Repositories\Contracts\BankRepositoryInterface;

class BankRepository implements BankRepositoryInterface
{
    protected $entity;

    public function __construct(Bank $bank)
    {
        $this->entity = $bank;
    }

    public function getBanks()
    {
        return $this->entity->all();
    }

    public function getBankByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->first();
    }

    public function createNewBank(array $request)
    {
        return $this->entity->create($request);
    }

    public function updateNewBank(array $request, string $uuid)
    {
        if(!$bank = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);

        $bank->update($request);

        return $bank;
    }

    public function deleteBank(string $uuid)
    {
        if(!$bank = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);

        $bank->delete();

        return response()->json([], 200);
    }
}