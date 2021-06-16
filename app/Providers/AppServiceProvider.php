<?php

namespace App\Providers;

use App\Models\Employee;
use App\Models\User;

use App\Observers\EmployeeObserver;
use App\Observers\UserObserver;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        
        Employee::observe(EmployeeObserver::class);
        User::observe(UserObserver::class);
    }
}
