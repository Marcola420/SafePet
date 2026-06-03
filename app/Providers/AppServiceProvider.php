<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;


\Illuminate\Support\Facades\Gate::define('access-admin', function ($user) {
    return $user->eAdmin();
});



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
    }
}
