<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ValidateAccount;
use App\Http\Resources\AccountResource;
use App\Services\AccountService;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    protected $accountService;

    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function index()
    {
        $accounts = $this->accountService->getAccounts();
        return AccountResource::collection($accounts);
    }
        
    public function show($uuid)
    {
        if(!$account = $this->accountService->getAccountByUuid($uuid))
        {
            return response()->json(['message' => 'Not Found'], 404);
        }

        return new AccountResource($account);
    }

    public function store(ValidateAccount $request)
    {
        $account = $this->accountService->createNewAccount($request->all());
        return new AccountResource($account);
    }

    public function update(ValidateAccount $request, $uuid)
    {
        $account = $this->accountService->updateNewAccount($request->all(), $uuid);
        return new AccountResource($account);
    }    

    public function destroy($uuid)
    {
        return $this->accountService->deleteAccount($uuid);
    }
}
