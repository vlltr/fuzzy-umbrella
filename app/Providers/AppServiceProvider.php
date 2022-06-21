<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Client\ConnectionException;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Http::macro('sap', function () {

            $url = config('services.sap.environment') == 'local' ? config('services.sap.url_local') : config('services.sap.url');
            $username = config('services.sap.environment') == 'local' ? config('services.sap.username_local') : config('services.sap.username');
            $password = config('services.sap.environment') == 'local' ? config('services.sap.password_local') : config('services.sap.password');
            
            return Http::withBasicAuth($username, $password)
                ->baseUrl($url)
                ->timeout(3);
        });
    }
}
