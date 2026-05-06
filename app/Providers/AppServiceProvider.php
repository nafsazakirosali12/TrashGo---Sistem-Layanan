<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Order;
use App\Models\Pembayaran;


use Illuminate\Pagination\Paginator;


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
        $orders = Order::all();
        $pembayarans = Pembayaran::all();

        $view->with('orders', $orders)
             ->with('pembayarans', $pembayarans);
    });

        Paginator::useBootstrap();

    }
}
