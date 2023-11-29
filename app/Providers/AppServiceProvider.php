<?php

namespace App\Providers;

use App\Repositories\SupportRepositoryInterface;
use Illuminate\Support\ServiceProvider;
use SupportEloquentORM;

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
