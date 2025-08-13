<?php

namespace App\Providers;

use App\Factory\AbstractDTOFactory;
use App\Factory\AbstractDTOFactoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public $bindings = [
        AbstractDTOFactoryInterface::class => AbstractDTOFactory::class
    ];

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
        //
    }
}
