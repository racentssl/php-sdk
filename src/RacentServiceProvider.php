<?php

namespace Racent;

use Illuminate\Support\ServiceProvider;

class RacentServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->singleton('racent', function () {
            return new Racent(config('supplier.racent.api_token'));
        });

        app()->singleton('nicsrs', function () {
            return new NicSRS(config('supplier.nicsrs.api_token'));
        });

        $this->mergeConfigFrom(__DIR__ . '/config.php', 'supplier');
    }
}
