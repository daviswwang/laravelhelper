<?php

namespace Daviswwang\LaravelHelper;

use Illuminate\Support\ServiceProvider;
use Psr\Container\ContainerInterface;


class LaravelServiceProvider extends ServiceProvider
{

    protected $defer = true;

    public function register()
    {
        $this->app->singleton(LaravelHelper::class, function ($app) {
            return new LaravelHelper($app);
        });
        $this->app->alias(LaravelHelper::class, 'laravelhelper');
    }

    public function provides()
    {
        return [LaravelHelper::class, 'laravelhelper'];
    }

    public function boot()
    {
        $path = realpath(__DIR__ . '/Config/HelperConfig.php');
        $this->publishes([$path => config_path('helper.php')], 'config');
        $this->mergeConfigFrom($path, 'laravelhelper');
    }


}
