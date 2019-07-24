<?php

namespace IPActive\Providers;


use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use IPActive\Events\IPActiveEvent;
use IPActive\Listeners\IPActiveListener;

class IPActiveEventServiceProvider  extends EventServiceProvider
{
    protected $listen = [
        IPActiveEvent::class => [
            IPActiveListener::class
        ],
    ];

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

}
