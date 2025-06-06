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

use Illuminate\Support\ServiceProvider;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Spatie\Activitylog\Models\Activity;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->publishes([
            __DIR__.'/../config/nova-activitylog.php' => config_path('nova-activitylog.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/nova-activitylog.php', 'nova-activitylog');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-activitylog');

        $this->app->booted(function () {
            // 记录操作者 IP
            // @see https://github.com/spatie/laravel-activitylog/issues/39
            config('activitylog.activity_model')::saving(function (Activity $activity) {
                $ip = request()->ip();

                if ($ip !== '127.0.0.1') {
                    $activity->properties = $activity->properties->put('ip', $ip);
                }
            });
        });

        Nova::serving(function (ServingNova $event) {
            activity()->enableLogging();

            Nova::resources([
                config('nova-activitylog.resource'),
            ]);
        });
    }
}
