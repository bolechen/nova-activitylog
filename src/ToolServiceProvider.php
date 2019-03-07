<?php

namespace Bolechen\NovaActivitylog;

use Bolechen\NovaActivitylog\Resources\Activitylog;
use Spatie\Activitylog\Models\Activity;
use Laravel\Nova\Nova;
use Laravel\Nova\Events\ServingNova;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Bolechen\NovaActivitylog\Http\Middleware\Authorize;

class ToolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'nova-activitylog');

        //记录操作者 IP
        //@see https://github.com/spatie/laravel-activitylog/issues/39
        Activity::saving(function (Activity $activity) {
            $activity->properties = $activity->properties->put('ip', request()->ip());
        });

        $this->app->booted(function () {
            Nova::resources([
                Activitylog::class
            ]);
            $this->routes();
        });

        Nova::serving(function (ServingNova $event) {
            activity()->enableLogging();
        });
    }

    /**
     * Register the tool's routes.
     *
     * @return void
     */
    protected function routes()
    {
        if ($this->app->routesAreCached()) {
            return;
        }

        Route::middleware(['nova', Authorize::class])
                ->prefix('nova-vendor/nova-activitylog')
                ->group(__DIR__.'/../routes/api.php');
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
}
