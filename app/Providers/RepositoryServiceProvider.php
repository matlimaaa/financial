<?php

namespace App\Providers;

use App\Repositories\Contracts\EmployeeRepositoryInterface;
use App\Repositories\EmployeeRepository;
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
         * **********************************************************************
         *                    LOGICA IMPLEMENTADA A INTERFACE                   *
         * **********************************************************************
         * Quando eu tentar injetar a EmployeeRepositoryInterface no Service
         * Layer, estarei criando um objeto EmployeeRepository, uma vez que
         * não é possível fazer a instância de um objetod e uma interface.
         * **********************************************************************
         */

        $this->app->bind(
            EmployeeRepositoryInterface::class,
            EmployeeRepository::class
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
