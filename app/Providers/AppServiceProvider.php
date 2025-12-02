<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL;


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
    public function boot()
    {
        $host = request()->getHost();

        // Paksa HTTPS jika domain adalah ngrok
        if (str_contains($host, 'ngrok-free.app') ||
            str_contains($host, 'ngrok-free.dev') ||
            str_contains($host, 'ngrok.dev') ||
            str_contains($host, 'ngrok-free')) 
        {
            \URL::forceScheme('https');
        }
    }




}
