<?php

namespace Vollborn\LaravelPermissionLite\Support\ServiceProvider;

use Illuminate\Support\ServiceProvider;

class LaravelPermissionLiteServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any package services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../Migrations');
    }
}
