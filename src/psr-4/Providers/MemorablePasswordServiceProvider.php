<?php


namespace Nicolaskuster\MemorablePasswords\Providers;


use Illuminate\Support\ServiceProvider;

class MemorablePasswordServiceProvider extends ServiceProvider
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
        $configKey = 'memorablepasswords';
        $originalConfig = __DIR__ . "/../../config/$configKey.php";

        $this->publishes([
            $originalConfig => config_path("$configKey.php"),
        ]);

        $this->mergeConfigFrom(
            $originalConfig, $configKey
        );
    }
}