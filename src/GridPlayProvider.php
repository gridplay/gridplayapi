<?php

namespace GridPlayAPI;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;

class GridPlayProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Supported Blade Directives
     *
     * @var array
     */
    protected $directives = [''];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerHtmlBuilder();

        $this->registerFormBuilder();

        $this->app->alias('gridpay', GridPay::class);

        $this->registerBladeDirectives();
    }

    /**
     * Register the GridPay instance.
     *
     * @return void
     */
    protected function registerGridPay()
    {
        $this->app->singleton('gridpay', function ($app) {
            return new GridPay();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['gridpay', GridPay::class];
    }
}
