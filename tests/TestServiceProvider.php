<?php

namespace OhSeeSoftware\LaravelPackageBoilerplate\Tests;

use OhSeeSoftware\LaravelPackageBoilerplate\ExampleServiceProvider;

class TestServiceProvider extends ExampleServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        parent::boot();

        $this->loadRoutesFrom(__DIR__ . '/routes/test-routes.php');
    }
}
