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
            if (auth('masyarakat')->check()) {
                $user = auth('masyarakat')->user();

                $navbarOrders = Order::where('masyarakat_id', $user->id)->get();
                $navbarPembayarans = Pembayaran::where('masyarakat_id', $user->id)->get();
            } else {
                $navbarOrders = collect();
                $navbarPembayarans = collect();
            }

        $view->with('navbarOrders', $navbarOrders)
            ->with('navbarPembayarans', $navbarPembayarans);
    });

        Paginator::useBootstrap();

    }
}
