<?php

namespace App\Providers;

use App\Models\Compra;
use App\Models\Compraproducto;
use App\Observers\CompraObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\CompraproductoObserver;

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
        //
        Compra::observe(CompraObserver::class);
        // Compraproducto::observe(CompraproductoObserver::class);
    }
}
