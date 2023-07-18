<?php

namespace App\Providers;

use App\Domain\Contracts\Repositories\CategoryRepositoryInterface;
use App\Domain\Contracts\Repositories\UserRepositoryInterface;
use App\Domain\Contracts\Services\AuthServiceInterface;
use App\Domain\Services\AuthService;
use App\Infrastructure\Repositories\CategoryRepository;
use App\Infrastructure\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class DomainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepository::class);

        $this->app->bind(AuthServiceInterface::class, AuthService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
