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

                $Orders = Order::where('masyarakat_id', $user->id)->get();
                $Pembayarans = Pembayaran::where('masyarakat_id', $user->id)->get();
            } else {
                $Orders = collect();
                $Pembayarans = collect();
            }

        $view->with('Orders', $Orders)
            ->with('Pembayarans', $Pembayarans);
    });

        Paginator::useBootstrap();

    }
}
