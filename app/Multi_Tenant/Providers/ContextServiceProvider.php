<?php

namespace App\Multi_Tenant\Providers;

use Illuminate\Support\ServiceProvider;
use App\Multi_Tenant\ClientContext;

class ContextServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['context'] = $this->app->share(function($app)
        {
            return new ClientContext;
        });

        $this->app->bind('App\Multi_Tenant\ClientContext', function($app)
        {
            return $app['context'];
        });
    }
}
