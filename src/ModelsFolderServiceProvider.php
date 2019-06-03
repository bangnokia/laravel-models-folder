<?php

namespace BangNokia\LaravelModelsFolder;

use BangNokia\LaravelModelsFolder\Commands\ModelMakeCommand;
use Illuminate\Support\ServiceProvider;

class ModelsFolderServiceProvider extends ServiceProvider
{
    /**
     * Register application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.model.make', function ($app) {
            $instance = new ModelMakeCommand($app['files']);

            return $instance;
        });

        $this->commands([ModelMakeCommand::class]);
    }

    public function provides()
    {
        return ['command.model.make'];
    }
}
