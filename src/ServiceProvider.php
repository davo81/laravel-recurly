<?php

namespace Davo81\LaravelRecurly;

use \Recurly_js;
use \Recurly_Client;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        Recurly_Client::$apiKey    = config('recurly.api_key', null);
        Recurly_Client::$subdomain = config('recurly.subdomain', null);
        Recurly_js::$privateKey    = config('recurly.private_key', null);
    }

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            realpath(dirname(__DIR__)) . '/config/recurly.php' => config_path('recurly.php'),
        ], 'config');
    }
}
