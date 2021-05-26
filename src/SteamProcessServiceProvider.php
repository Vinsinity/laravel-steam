<?php

namespace Vinsinity\LaravelSteam;

use Illuminate\Cache\CacheManager;
use Illuminate\Support\ServiceProvider;

class SteamProcessServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('steam-inventory.php')]);
    }
    public function register()
    {
        $this->app->singleton('steam-prices', function () {
            $cacheManager = new CacheManager($this->app);
            return new SteamProcess($cacheManager);
        });
    }
}
