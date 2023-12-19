<?php

namespace Racent;

use Illuminate\Support\ServiceProvider;

class RacentServiceProvider extends ServiceProvider
{
    public function register()
    {
        app()->singleton('racent', function () {
            return new Racent(config('supplier.racent.api_token'), config('supplier.racent.api_url', null));
        });

        app()->singleton('nicsrs', function () {
            return new NicSRS(config('supplier.nicsrs.api_token'), config('supplier.nicsrs.api_url', null));
        });

        $this->mergeConfigFrom(__DIR__ . '/config.php', 'supplier');
    }
}
