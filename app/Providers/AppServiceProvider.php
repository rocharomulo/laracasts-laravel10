<?php

namespace App\Providers;

use App\Repositories\{SupportEloquentORM};
use App\Repositories\{SupportRepositoryInterface};
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SupportRepositoryInterface::class, // classe abastrata (interface)

                         SupportEloquentORM::class);        // classe concreta
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
