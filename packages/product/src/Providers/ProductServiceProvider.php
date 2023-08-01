<?php

namespace QH\Product\Providers;

use Illuminate\Support\ServiceProvider;
use QH\Product\Repository\ProductRepository;
use QH\Product\Repository\ProductRepositoryInterface;

class ProductServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            ProductRepositoryInterface::class,
            ProductRepository::class
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'product');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../public' => public_path('qh/product'),
        ], 'public');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/admin/product'),
        ]);
    }
}
