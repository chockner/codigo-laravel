<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
/* use Illuminate\Support\ServiceProvider; */
use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /** 
     * Register any application services.
     */

    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        \App\Events\ServicioSaved::class => [
            \App\Listeners\OptimizeServicioImage::class
        ]
    ];

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
