<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AuthorInterface;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\FollowerInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\ViewInterface;
use App\Http\Requests\ViewRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View ;

class DashboardController extends Controller
{
    private NewsCategoryInterface $newsCategory;
    private FollowerInterface $followers;
    private AuthorInterface $author;
    private UserInterface $user;
    private CategoryInterface $category;
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;
    private FaqInterface $faq;
    private ViewInterface $view;

    public function __construct(FollowerInterface $followers, ViewInterface $view,NewsCategoryInterface $newsCategory, UserInterface $user, AuthorInterface $author, NewsInterface $news, CategoryInterface $category, SubCategoryInterface $subCategory,FaqInterface $faq)
    {
        $this->user = $user;
        $this->author = $author;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->news = $news;
        $this->faq = $faq;
        $this->followers = $followers;

        $this->newsCategory = $newsCategory;
        $this->view = $view;
    }

    public function index(){
        $users = $this->user->get()->count();
        $authors = $this->author->get()->count();
        $news_count = $this->news->get()->count();
        $authors1 = $this->author->showWhithCount();

        $news = $this->news->getAllNews();
        $categories = $this->category->showWhithCount();
        $news2 = $this->news->showCountMonth();

        $newsCategory = $this->newsCategory->trending();
        return view('pages.admin.index', compact('authors', 'users', 'news_count', 'categories', 'news', 'authors1', 'news2'));
    }

    public function home(){
        $newsTrending = $this->news->get();
        $news = $this->news->get();
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        $trendings = $this->view->trending();

        $news_left = $this->news->getAllNews();
        $news_right = $this->news->getByRight();
        $news_mid = $this->news->getByMid();

        $populars = $this->news->getByPopular();
        $popular_post = $this->news->showWhithCount();
        $news_recent = $this->news->latest();
        $editor_pick = $this->newsCategory->get();
        $picks = $this->newsCategory->get();

        $generals = $this->news->getByGeneral();
        return view('pages.index',compact('news', 'news_left', 'news_mid', 'news_right', 'categories', 'subCategories','trendings', 'news_recent', 'populars', 'editor_pick', 'generals', 'popular_post', 'picks'));
    }

    public function navbar(){
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('layouts.user.navbar-header', compact('categories', 'subCategories'));
    }

    public function mobileHeader(){
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('layouts.user.mobile-navbar', compact('categories', 'subCategories'));
    }

    public function userProfile(){
        $following = $this->followers->get()->where('user_id', auth()->user()->id)->count();
        return view('pages.user.profile.index', compact('following'));
    }

    public function authoruser(Request $request) {
        $authors = $this->author->showWhithCountSearch($request);
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.author.index', compact('categories', 'subCategories', 'authors'));
    }

    public function aboutus() {
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.about.index', compact('categories', 'subCategories'));
    }

    public function newspost() {
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.news.news', compact('categories', 'subCategories'));
    }

    public function authordetail() {
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.author.detail-author', compact('categories', 'subCategories'));
    }

    public function privacypolicy() {
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.privacy-policy.index', compact('categories', 'subCategories'));
    }

    public function faq() : View {
        $faqs = $this->faq->get();
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();

        return view('pages.contact.faq',compact('faqs','categories', 'subCategories'));
    }
}
