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
                    ->select('id', 'status', 'created_at', 'updated_at')
                    ->addSelect(DB::raw("'order' as type"));

                $pembayarans = Pembayaran::where('masyarakat_id', $user->id)
                    ->select('id', 'status', 'created_at', 'updated_at')
                    ->addSelect(DB::raw("'payment' as type"));

                $notificationsAll = $orders
                    ->unionAll($pembayarans)
                    ->orderByDesc('created_at')
                    ->get();

                // CEK ADA NOTIF BARU ATAU TIDAK
                $hasNewNotif = $notificationsAll->contains(function ($notif) use ($user) {
                    return !$user->last_read_notif 
                        || $notif->created_at > $user->last_read_notif;
                });

                $hasStatusUpdate = $notificationsAll->contains(function ($notif) use ($user) {
                                $isUpdated =
                    !$user->last_read_status ||
                    $notif->updated_at > $user->last_read_status;

                $isNewNotif =
                    !$user->last_read_notif ||
                    $notif->created_at > $user->last_read_notif;

                return $isUpdated && !$isNewNotif;
                });

            } else {
                $notificationsAll = collect();
                $hasNewNotif = false;
                $hasStatusUpdate = false;
            }

            $view->with([
                'notificationsAll' => $notificationsAll,
                'hasNewNotif' => $hasNewNotif,
                'hasStatusUpdate' => $hasStatusUpdate
            ]);
        });

        Paginator::useBootstrap();

    }
}
