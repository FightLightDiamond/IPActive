<?php

namespace IPActive;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\ServiceProvider;
use IPActive\Console\Commands\IPActiveCleanCommand;
use IPActive\Http\Middleware\IPActiveMiddleware;
use IPActive\Providers\IPActiveEventServiceProvider;

class IPActiveServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
        $this->mergeConfigFrom(__DIR__ . '/../config/ip-active.php', 'ip-active');

        $this->publishes([
            __DIR__ . '/../config/ip-active.php' => config_path('ip-active.php'),
        ], 'ip-active');

        $this->commands([
            IPActiveCleanCommand::class
        ]);

        $this->app->booted(function () {
            $schedule = $this->app->make(Schedule::class);
            $schedule->command('ip-active:clean')->cron(config('ip-active.ip_active_log_clean_cron'));
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        app('router')->aliasMiddleware(Define::MIDDLEWARE, IPActiveMiddleware::class);

        $this->app->register(IPActiveEventServiceProvider::class);
    }
}
