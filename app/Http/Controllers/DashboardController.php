<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Http\Requests\ViewRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    private CategoryInterface $category;
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;

    public function __construct(NewsInterface $news, CategoryInterface $category, SubCategoryInterface $subCategory)
    {
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->news = $news;
    }

    public function index(){
        return view('pages.admin.index');
    }
    public function home(){
        $news = $this->news->get();
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.index',compact('news', 'categories', 'subCategories'));
    }

    public function navbar(){
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('layouts.user.navbar-header', compact('categories', 'subCategories'));
    }

    public function userProfile(User $user){
        // $users = $this->user->get();
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.profile.index', compact('user', 'categories', 'subCategories'));
    }

    public function authoruser() {
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.author.index', compact('categories', 'subCategories'));
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
}
