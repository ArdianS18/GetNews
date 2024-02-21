<?php

namespace App\Providers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\SubCategoryRepository;

use App\Contracts\Interfaces\ContactUsInterface;
use App\Contracts\Interfaces\SearchInterface;
use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Repositories\ContactUsRepository;
use App\Contracts\Repositories\FaqRepository;
use App\Contracts\Repositories\NewsRepository;
use App\Contracts\Repositories\SearchRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    private array $register = [
        CategoryInterface::class => CategoryRepository::class,
        SubCategoryInterface::class => SubCategoryRepository::class,
        FaqInterface::class => FaqRepository::class,
        ContactUsInterface::class => ContactUsRepository::class,
        NewsInterface::class => NewsRepository::class,
        // SearchInterface::class => SearchRepository::class
    ];

    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) $this->app->bind($index, $value);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
