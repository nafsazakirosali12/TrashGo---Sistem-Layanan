<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Models\Order;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;


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

                $orders = Order::where('masyarakat_id', $user->id)
                    ->select('id', 'status', 'created_at')
                    ->addSelect(DB::raw("'order' as type"));

                $pembayarans = Pembayaran::where('masyarakat_id', $user->id)
                    ->select('id', 'status', 'created_at')
                    ->addSelect(DB::raw("'payment' as type"));

                $notificationsAll = $orders
                    ->unionAll($pembayarans)
                    ->orderByDesc('created_at')
                    ->get();

            } else {
                $notificationsAll = collect();
            }

            $view->with('notificationsAll', $notificationsAll);
        });

        Paginator::useBootstrap();

    }
}
