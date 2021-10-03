<?php

namespace App\Repositories\TransactionRepositoryTypeFiles;
use Carbon\Carbon;
use OfxParser\Parser;
use App\Models\Account;
use App\Models\Transaction;
use App\Repositories\Contracts\TransactionRepositoryTypeFiles\TypeFilesTransactionRepositoryInterface;

class TransactionRepositoryOfx implements TypeFilesTransactionRepositoryInterface
{
    // public function createTransactions(string $pathFile)
    // {
    //     $transactions = $this->restrictTransactions($pathFile);
    //     return $transactions;
    //     // return $this->existsOrNew($transactions, $pathFile);
    // }

    public function restrictTransactions(string $pathFile)
    {
        $parser = new Parser();
        $transactions = array();
        $now = Carbon::now()->format('Y-m-d');
        $ofxFile = $parser->loadFromFile("../storage/app/".$pathFile);
        $data = reset($ofxFile->bankAccounts);

        $account = Account::where(
            'account', (int)str_replace('-', '', strval($data->accountNumber))
        )->first();

        foreach($data->statement->transactions as $record)
        {
            if(($record->type != "DEBIT" && $record->amount > 0)
                && $record->date->format('Y-m-d') != $now)
            {
                $searchRecords = Transaction::where([
                    ['by_admin', false],
                    ['account_id', $account->id],
                    ['date', $record->date->format('Y-m-d')],
                ])->get();

                if(count($searchRecords) === 0)
                {
                    $transactions[] = $this->defaultTransactionStructure($record, $account->id);
                }
            }
        }

        return $transactions;
    }

    private function defaultTransactionStructure(object $transaction, $accountId = null)
    {
        return [
            'code' => $transaction->uniqueId,
            'description' => $transaction->memo,
            'price' => $transaction->amount,
            'document_protocol' => $transaction->checkNumber,
            'account_id' => $accountId,
            'date' => $transaction->date->format('Y-m-d'),
        ];
    }

    public function deleteFileTransaction()
    {

    }

    public function removePatterns()
    {

    }

}