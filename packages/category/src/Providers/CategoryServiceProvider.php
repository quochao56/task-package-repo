<?php

namespace QH\Category\Providers;

use App\Http\Middleware\Role;
use Illuminate\Support\ServiceProvider;
use QH\Category\Repository\CategoryRepository;
use QH\Category\Repository\CategoryRepositoryInterface;

class CategoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        // $this->app->make(CategoryController::class);
        $this->app->singleton(
            CategoryRepositoryInterface::class,
            CategoryRepository::class
        );
        $this->app['router']->aliasMiddleware('role', Role::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'category');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->publishes([
            __DIR__ . '/../public' => public_path('qh/category'),
        ], 'public');
        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/admin/category'),
        ]);
    }
}
