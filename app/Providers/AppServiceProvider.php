<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\ProductRepositoryInterface;
use App\Repositories\ProductRepository;
<<<<<<< HEAD
use App\Repositories\CartRepository;
use App\Repositories\CartRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
=======

>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CartRepositoryInterface::class, CartRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
<<<<<<< HEAD
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
=======
>>>>>>> 72509b2c56c500f3e665bc5ac9d82e75f20b4819
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}