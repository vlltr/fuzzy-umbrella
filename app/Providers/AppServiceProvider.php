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
            $url = App::environment('local') ? env('SAP_URL_SERVICE_LOCAL') : env('SAP_URL_SERVICE');
            $username = App::environment('local') ? env('SAP_SERVICE_USERNAME_LOCAL') : env('SAP_SERVICE_USERNAME');
            $password = App::environment('local') ? env('SAP_SERVICE_PASSWORD_LOCAL') : env('SAP_SERVICE_PASSWORD');
            
            return Http::withBasicAuth($username, $password)
                ->baseUrl($url)
                ->timeout(3);
        });
    }
}
