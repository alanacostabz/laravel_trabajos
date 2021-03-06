<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CacheMessages;
use App\Repositories\MessagesInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        app()->bind(MessagesInterface::class, CacheMessages::class);
    }
}
