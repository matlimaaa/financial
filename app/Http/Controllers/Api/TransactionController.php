<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ValidateTransaction;
use App\Http\Resources\TransactionResoure;
use App\Services\TransactionService;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    protected $transactionService;

    public function __construct(TransactionService $transactionService)
    {
        $this->transactionService = $transactionService;
    }

    public function index()
    {
        $transactions = $this->transactionService->getTransactions();
        return TransactionResoure::collection($transactions);
    }

    public function show($uuid)
    {
        if(!$transaction = $this->transactionService->getTransactionByUuid($uuid))
            return response()->json(['message' => 'Not Found'], 404);
        
        return new TransactionResoure($transaction);
    }

    public function store(ValidateTransaction $request)
    {
        $transaction = $this->transactionService->createNewTransaction($request->all());
        return new TransactionResoure($transaction);
    }
    
    public function update(Request $request, $uuid)
    {
        $transaction = $this->transactionService->updateTransaction($request->all(), $uuid);
        return new TransactionResoure($transaction);
    }

    public function destroy(string $uuid)
    {
        return $this->transactionService->deleteTransaction($uuid);
    }

    public function uploadTransactions(Request $request)
    {
        return TransactionResoure::collection($this->transactionService->uploadTransactions($request));
    }
}
