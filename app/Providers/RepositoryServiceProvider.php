<?php

namespace App\Providers;

use App\Repositories\Contracts\AccountRepositoryInterface;
use App\Repositories\Contracts\BankRepositoryInterface;
use App\Repositories\Contracts\EmployeeRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;
use App\Repositories\Contracts\TransactionRepositoryInterface;

use App\Repositories\AccountRepository;
use App\Repositories\BankRepository;
use App\Repositories\EmployeeRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;
use App\Repositories\TransactionRepository;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        /**
         * *****************************************************************************
         *                          LOGICA IMPLEMENTADA A INTERFACE                    *
         * *****************************************************************************
         * Quando tentar injetar <class>RepositoryInterface(exemplo: UserReposi...)    *
         * no Service Layer, estarei criando um objeto                                 *
         * <class>Repository(exemplo: UserReposi...),                                  *
         * uma vez que não é possível fazer a instância de um objeto de uma interface. *
         * *****************************************************************************
         */

        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
        );

        $this->app->bind(
            UserRepositoryInterface::class,
            UserRepository::class
        );

        $this->app->bind(
            PostRepositoryInterface::class,
            PostRepository::class
        );

        $this->app->bind(
            BankRepositoryInterface::class,
            BankRepository::class
        );

        $this->app->bind(
            AccountRepositoryInterface::class,
            AccountRepository::class
        );

        $this->app->bind(
            TransactionRepositoryInterface::class,
            TransactionRepository::class
        );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
