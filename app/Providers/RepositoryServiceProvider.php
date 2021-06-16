<?php

namespace App\Providers;

use App\Repositories\Contracts\EmployeeRepositoryInterface;
use App\Repositories\Contracts\PostRepositoryInterface;
use App\Repositories\Contracts\UserRepositoryInterface;

use App\Repositories\EmployeeRepository;
use App\Repositories\PostRepository;
use App\Repositories\UserRepository;

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
         * Quando tentar injetar <class>RepositoryInterface(exemplo: UserReposi...)
         * no Service Layer, estarei criando um objeto 
         * <class>Repository(exemplo: UserReposi...),
         * uma vez que não é possível fazer a instância de um objetod e uma interface.
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
