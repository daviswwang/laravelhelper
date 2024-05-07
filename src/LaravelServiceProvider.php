<?php

namespace Daviswwang\LaravelHelper;

use Illuminate\Support\ServiceProvider;
use Psr\Container\ContainerInterface;


class LaravelServiceProvider extends ServiceProvider
{

    protected $defer = true;

    public function register()
    {
        $this->app->singleton(JWT::class, function ($app) {
            return new JWT($app, (new BlackList($app)));
        });
        $this->app->alias(JWT::class, 'jwt');
    }

    public function provides()
    {
        return [LaravelOSS::class, 'laraveloss'];
    }

    public function boot()
    {
        $path = realpath(__DIR__ . '/Config/AliConfig.php');
        $this->publishes([$path => config_path('oss.php')], 'config');
        $this->mergeConfigFrom($path, 'laraveloss');
    }


}
