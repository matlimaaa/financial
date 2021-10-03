<?php

namespace App\Repositories;

use App\Models\Account;
use OfxParser\Parser;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Repositories\Contracts\TransactionRepositoryInterface;
use App\Repositories\TransactionRepositoryTypeFiles\TransactionRepositoryCsv;
use App\Repositories\TransactionRepositoryTypeFiles\TransactionRepositoryOfx;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class TransactionRepository implements TransactionRepositoryInterface
{
    protected $entity, $repositoryOfx, $repositoryCsv;

    public function __construct(
        Transaction $transaction, 
        TransactionRepositoryOfx $repositoryOfx,
        TransactionRepositoryCsv $repositoryCsv
    )
    {
        $this->entity = $transaction;
        $this->repositoryOfx = $repositoryOfx;
        $this->repositoryCsv = $repositoryCsv;
    }

    public function getTransactions()
    {
        return $this->entity->paginate();
    }

    public function getTransactionByUuid(string $uuid)
    {
        return $this->entity->where('uuid', $uuid)->first();
    }

    public function createNewTransaction(array $request)
    {
        return $this->entity->create($request);
    }

    public function updateTransaction(array $request, string $uuid)
    {
        if(!$transaction = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);
        
        $transaction->update($request);

        return $transaction;
    }

    public function deleteTransaction(string $uuid)
    {
        if(!$transaction = $this->entity->where('uuid', $uuid)->first())
            return response()->json(['message' => 'Not Found'], 404);
        
        $transaction->delete();

        return response()->json([], 200);
    }

    public function uploadTransactions(Request $request)
    {
        $extension = strtolower($request->file->getClientOriginalExtension());
        $fileName = time() . '.' . $extension;
        $resultUploadFile = $request->file('file')->storeAs('transactions', $fileName);

        if($resultUploadFile)
        {
            $transactions = 
                ($extension == 'ofx' ? 
                    $this->repositoryOfx->restrictTransactions($resultUploadFile) : 
                    $this->repositoryCsv->createTransactions($resultUploadFile));

            return $this->existsOrNew($transactions, $resultUploadFile);
        }
    }

    public function existsOrNew(array $records, string $pathFile)
    {
        $transactions = array();
        foreach($records as $record)
        {
            $newTransaction = $this->entity->firstOrNew($record);
            if(!$newTransaction->id){
                $newTransaction->save();
                $transactions[] = $newTransaction;
            }
        }

        Storage::delete($pathFile);
        return $transactions;
    }
}