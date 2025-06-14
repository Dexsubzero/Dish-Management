<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Dish;
use App\Models\Order;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         View::composer('*', function ($view) {
            $dishes = Dish::all(); // Be cautious with large datasets
            $view->with('dishes', $dishes);
        });

        View::composer('*', function ($view) {
            $orders = Order::all(); // Be cautious with large datasets
            $view->with('orders', $orders);
        });
    }
}
