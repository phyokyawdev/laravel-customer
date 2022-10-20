<?php

namespace App\Providers;

use App\interfaces\CityRepositoryInterface;
use App\interfaces\CustomerRepositoryInterface;
use App\interfaces\UserRepositoryInterface;
use App\interfaces\ZoneRepositoryInterface;
use App\Repositories\CityRepository;
use App\Repositories\CustomerRepository;
use App\Repositories\UserRepository;
use App\Repositories\ZoneRepository;
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
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CityRepositoryInterface::class, CityRepository::class);
        $this->app->bind(ZoneRepositoryInterface::class, ZoneRepository::class);
        $this->app->bind(CustomerRepositoryInterface::class, CustomerRepository::class);
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
