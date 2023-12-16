<?php

namespace App\Domains\Courses;

use App\Domains\Courses\Repos\CategoryRepositoryInterface;
use App\Domains\Courses\Repos\CategoryRepositoryPDO;
use App\Domains\Courses\Repos\SessionRepositoryInterface;
use App\Domains\Courses\Repos\SessionRepositoryPDO;
use Illuminate\Support\ServiceProvider;

class DomainProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(SessionRepositoryInterface::class, SessionRepositoryPDO::class);
        $this->app->bind(CategoryRepositoryInterface::class, CategoryRepositoryPDO::class);
        $this->app->bind(SessionServiceInterface::class, SessionService::class);
    }
}
