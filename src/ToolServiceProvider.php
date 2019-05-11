<?php

/*
 * This file is part of the bolechen/nova-activitylog
 *
 * (c) Bole Chen <avenger@php.net>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Bolechen\NovaActivitylog;

use Bolechen\NovaActivitylog\Resources\Activitylog;
use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Spatie\Activitylog\Models\Activity;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-activitylog');

        // 记录操作者 IP
        // @see https://github.com/spatie/laravel-activitylog/issues/39
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });

        $this->app->booted(function () {
            Nova::resources([
                Activitylog::class,
            ]);
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            activity()->enableLogging();
        });

        $this->publishes([
            __DIR__.'/../config/nova-activitylog.php' => config_path('nova-activitylog.php'),
        ], 'config');
    }

    /**
     * Register the tool's routes.
     */
    protected function routes()
    {
    }

    /**
     * Register any application services.
     */
    public function register()
    {
    }
}
