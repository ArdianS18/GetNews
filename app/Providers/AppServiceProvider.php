<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\AuthorInterface;
use App\Contracts\Interfaces\SearchInterface;



use App\Contracts\Repositories\FaqRepository;
use App\Contracts\Interfaces\CommentInterface;
use App\Contracts\Repositories\NewsRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\RegisterInterface;
use App\Contracts\Interfaces\ContactUsInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsPhotoInterface;
use App\Contracts\Repositories\AuthorRepository;
use App\Contracts\Repositories\SearchRepository;
use App\Contracts\Repositories\CommentRepository;
use App\Contracts\Interfaces\NewsHasLikeInterface;
use App\Contracts\Interfaces\NewsSubCategoryInterface;
use App\Contracts\Interfaces\NewsTagInterface;
use App\Contracts\Interfaces\ReportInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\TagInterface;
use App\Contracts\Interfaces\ViewInterface;
use App\Contracts\Repositories\CategoryRepository;
use App\Contracts\Repositories\RegisterRepository;
use App\Contracts\Repositories\ContactUsRepository;
use App\Contracts\Repositories\NewsCategoryRepository;
use App\Contracts\Repositories\NewsPhotoRepository;
use App\Contracts\Repositories\NewsHasLikeRepository;
use App\Contracts\Repositories\NewsSubCategoryRepository;
use App\Contracts\Repositories\NewsTagRepository;
use App\Contracts\Repositories\ReportRepository;
use App\Contracts\Repositories\SubCategoryRepository;
use App\Contracts\Repositories\TagRepository;
use App\Contracts\Repositories\ViewRepository;

class AppServiceProvider extends ServiceProvider
{

    private array $register = [
        CategoryInterface::class => CategoryRepository::class,
        SubCategoryInterface::class => SubCategoryRepository::class,
        FaqInterface::class => FaqRepository::class,
        ContactUsInterface::class => ContactUsRepository::class,
        NewsInterface::class => NewsRepository::class,
        UserInterface::class => UserRepository::class,
        NewsPhotoInterface::class => NewsPhotoRepository::class,
        CommentInterface::class => CommentRepository::class,
        NewsHasLikeInterface::class => NewsHasLikeRepository::class,
        AuthorInterface::class => AuthorRepository::class,
        RegisterInterface::class => RegisterRepository::class,
        ViewInterface::class => ViewRepository::class,
        ReportInterface::class => ReportRepository::class,
        TagInterface::class => TagRepository::class,
        NewsCategoryInterface::class => NewsCategoryRepository::class,
        NewsSubCategoryInterface::class => NewsSubCategoryRepository::class,
        NewsTagInterface::class => NewsTagRepository::class
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
