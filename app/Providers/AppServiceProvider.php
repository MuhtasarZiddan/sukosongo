<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use App\Models\Berita;
use App\Models\Umkm;
use App\Models\PerangkatDesa;

use App\Observers\ActivityObserver;

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
        User::observe(ActivityObserver::class);
        Umkm::observe(ActivityObserver::class);
        Berita::observe(ActivityObserver::class);
        PerangkatDesa::observe(ActivityObserver::class);
    }
}
