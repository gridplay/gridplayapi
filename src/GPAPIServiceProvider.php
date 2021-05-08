<?php
namespace GridPlayAPI;
use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
class GPAPIServiceProvider extends ServiceProvider {
	protected $defer = false;
    public function register() {
        $this->app->bind('gridplay', function (Application $app) {
            $config = $app->make('config');
            $class = $config->get('gridplay');
            return new $class;
        });
    }
    public function provides() {
        return ['gridplay'];
    }
    public function boot() {
        $this->registerConfigurations();
    }
    protected function registerConfigurations() {
        $this->mergeConfigFrom($this->packagePath('config/gridplay.php'), '');
        $this->publishes([$this->packagePath('config/gridplay.php') => config_path('gridplay.php')]);
    }
    protected function packagePath($path = '') {
        return sprintf('%s/../%s', __DIR__, $path);
    }
}