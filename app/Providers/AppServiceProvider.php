<?php

namespace App\Providers;

use App\Models\Employee;
use App\Models\Post;
use App\Models\User;

use App\Observers\EmployeeObserver;
use App\Observers\PostObserver;
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
        Post::observe(PostObserver::class);
    }
}
