<?php

namespace App\Providers;

use App\Http\Services\AccessService;
use App\Http\Services\AccessServiceInterface;
use App\Http\Services\UploadService;
use App\Http\Services\UploadServiceInterface;
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
        $this->app->bind(UploadServiceInterface::class, UploadService::class);
        $this->app->bind(AccessServiceInterface::class, AccessService::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
