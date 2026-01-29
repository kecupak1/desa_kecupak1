<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator; // Import ini untuk Pagination
use App\Models\Ticket;

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
        // 1. Set Default String Length untuk database
        Schema::defaultStringLength(191);

        // 2. Aktifkan Pagination Tailwind (PENTING: Agar pagination muncul)
        Paginator::useTailwind();

        // 3. Share data 'waitingCount' ke semua View/Blade
        view()->share('waitingCount', Ticket::where('status', 'waiting')->count());

        // 4. Force HTTPS jika di lingkungan production (opsional)
        if (app()->environment('production')) {
            \URL::forceScheme('https');
        }
    }
}