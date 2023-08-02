<?php

namespace QH\Order\Providers;

use Illuminate\Support\ServiceProvider;
use QH\Order\Repository\PurchaseRepository;
use QH\Order\Http\Controllers\PurchaseController;
use QH\Order\Repository\PurchaseRepositoryInterface;

class PurchaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->make(PurchaseController::class);
        $this->app->singleton(
           PurchaseRepositoryInterface::class,
           PurchaseRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'order');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/admin/order'),
        ]);
    }
}
