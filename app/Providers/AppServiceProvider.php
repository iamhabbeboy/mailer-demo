<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repository\Contracts\SubscriptionRepositoryInterface',
            'App\Repository\Subscription\SubscriptionRepository',
        );

        $this->app->bind(
            'App\Repository\Contracts\FieldRepositoryInterface',
            'App\Repository\Field\FieldRepository',
        );

        $this->app->bind(
            'App\Repository\Contracts\FieldValueRepositoryInterface',
            'App\Repository\FieldValue\FieldValueRepository',
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
