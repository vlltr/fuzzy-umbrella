<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\ServiceProvider;

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
        Http::macro('sap', function (){
            if (App::environment('local')) {
                return Http::withBasicAuth(env('SAP_SERVICE_USERNAME_LOCAL'), env('SAP_SERVICE_PASSWORD_LOCAL'))->baseUrl(env('SAP_URL_SERVICE_LOCAL'));
            }

            if (App::environment('production')) {
                return Http::withBasicAuth(env('SAP_SERVICE_USERNAME'), env('SAP_SERVICE_PASSWORD'))->baseUrl(env('SAP_URL_SERVICE'));
            }

            abort(500, 'Server Error');
        });
    }
}
