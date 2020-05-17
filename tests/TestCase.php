<?php

namespace OhSeeSoftware\LaravelPackageBoilerplate\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

class TestCase extends TestbenchTestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // $this->setupDatabase();
        // $this->withFactories(__DIR__ . '/factories');
    }

    protected function setupDatabase()
    {
        // Create a schema here if you need one for testing
    }


    protected function getPackageProviders($app)
    {
        return [\OhSeeSoftware\LaravelPackageBoilerplate\Tests\TestServiceProvider::class];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testbench');
        $app['config']->set('database.connections.testbench', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);
    }
}
