<?php

namespace ThinkOne\NovaLaravelFilemanager\Tests;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Laravel\Nova\NovaCoreServiceProvider;
use ThinkOne\NovaLaravelFilemanager\Tests\Fixtures\NovaServiceProvider;

class TestCase extends \Orchestra\Testbench\TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        Artisan::call('nova:publish');
    }


    protected function getPackageProviders($app): array
    {
        return [
            \Inertia\ServiceProvider::class,
            NovaCoreServiceProvider::class,
            NovaServiceProvider::class,
            \ThinkOne\NovaLaravelFilemanager\ServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     *
     * @param  \Illuminate\Foundation\Application  $app
     *
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

        // $app['config']->set('nova-laravel-filemanager.some_key', 'some_value');
    }
}
