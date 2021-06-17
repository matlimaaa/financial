<?php

namespace App\Observers;

use App\Models\Bank;
use Illuminate\Support\Str;

class BankObserver
{
    /**
     * Handle the Bank "creating" event.
     *
     * @param  \App\Models\Bank  $bank
     * @return void
     */
    public function creating(Bank $bank)
    {
        $bank->uuid = Str::uuid();
        $bank->status = true;
    }

    /**
     * Handle the Bank "updated" event.
     *
     * @param  \App\Models\Bank  $bank
     * @return void
     */
    public function updated(Bank $bank)
    {
        //
    }

    /**
     * Handle the Bank "deleted" event.
     *
     * @param  \App\Models\Bank  $bank
     * @return void
     */
    public function deleted(Bank $bank)
    {
        //
    }

    /**
     * Handle the Bank "restored" event.
     *
     * @param  \App\Models\Bank  $bank
     * @return void
     */
    public function restored(Bank $bank)
    {
        //
    }

    /**
     * Handle the Bank "force deleted" event.
     *
     * @param  \App\Models\Bank  $bank
     * @return void
     */
    public function forceDeleted(Bank $bank)
    {
        //
    }
}
