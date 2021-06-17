<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ValidateBank;
use App\Http\Resources\BankResource;
use App\Services\BankService;
use Illuminate\Http\Request;

class BankController extends Controller
{
    protected $bankService;

    public function __construct(BankService $bankService)
    {
        $this->bankService = $bankService;
    }

    public function index()
    {
        $banks = $this->bankService->getBanks();
        return BankResource::collection($banks);
    }

    public function show($uuid)
    {
        if(!$bank = $this->bankService->getBankByUuid($uuid))
        {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new BankResource($bank);
    }
    
    public function store(ValidateBank $request)
    {
        $bank = $this->bankService->createNewBank($request->all());
        return new BankResource($bank);
    }
    
    public function update(ValidateBank $request, $uuid)
    {
        $bank = $this->bankService->updateNewBank($request->all(), $uuid);
        return new BankResource($bank);
    }
    
    public function destroy($uuid)
    {
        return $this->bankService->deleteBank($uuid);
    }
}
