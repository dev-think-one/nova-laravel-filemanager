<?php

namespace ThinkOne\NovaLaravelFilemanager;

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;

class FieldServiceProvider extends ServiceProvider {
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot() {
        Nova::serving( function ( ServingNova $event ) {
            Nova::script( 'nova-laravel-filemanager', __DIR__ . '/../dist/js/field.js' );
            Nova::style( 'nova-laravel-filemanager', __DIR__ . '/../dist/css/field.css' );
        } );
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {
        //
    }
}
