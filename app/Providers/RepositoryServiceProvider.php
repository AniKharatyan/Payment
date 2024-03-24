<?php

namespace App\Providers;

use app\Repository\Read\PaymentReadRepository;
use app\Repository\Read\PaymentReadRepositoryInterface;
use app\Repository\Read\UserReadRepository;
use app\Repository\Read\UserReadRepositoryInterface;
use app\Repository\Write\PaymentWriteRepository;
use app\Repository\Write\PaymentWriteRepositoryInterface;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            PaymentReadRepositoryInterface::class,
            PaymentReadRepository::class
        );

        $this->app->bind(
            PaymentWriteRepositoryInterface::class,
            PaymentWriteRepository::class
        );

        $this->app->bind(
            UserReadRepositoryInterface::class,
            UserReadRepository::class
        );
    }
}
