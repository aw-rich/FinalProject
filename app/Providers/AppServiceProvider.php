<?php

namespace App\Providers;

use App\Policies\UserPolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        Gate::define('hasRole', [UserPolicy::class, 'hasRole']);
        ///Model::shouldBeStrict(! $this->app->isProduction());
        //Model::automaticallyEagerLoadRelations($this->app->isProduction());
    }
}
