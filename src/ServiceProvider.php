<?php

namespace ThinkOne\NovaLaravelFilemanager;

use Illuminate\Support\Facades\Route;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Http\Middleware\Authenticate;
use Laravel\Nova\Nova;
use ThinkOne\NovaLaravelFilemanager\Http\Middleware\Authorize;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->booted(function () {
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            Nova::script('nova-laravel-filemanager', __DIR__ . '/../dist/js/field.js');
            Nova::style('nova-laravel-filemanager', __DIR__ . '/../dist/css/field.css');
            Nova::translations(__DIR__ . '/../lang/'.app()->getLocale().'.json');
            Nova::translations(lang_path('vendor/nova-laravel-filemanager/'.app()->getLocale().'.json'));
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Nova::router(['nova', Authenticate::class, Authorize::class], 'nova-laravel-filemanager')
            ->group(__DIR__.'/../routes/inertia.php');

        Route::middleware(['nova', Authorize::class])
            ->prefix('nova-vendor/nova-laravel-filemanager')
            ->group(__DIR__.'/../routes/api.php');
    }
}
