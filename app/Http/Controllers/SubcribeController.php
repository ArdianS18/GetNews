<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Models\subcribe;
use Illuminate\Http\Request;

class SubcribeController extends Controller
{
    private NewsCategoryInterface $newsCategory;
    private CategoryInterface $category;
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;

    public function __construct(NewsCategoryInterface $newsCategory, NewsInterface $news, CategoryInterface $category, SubCategoryInterface $subCategory)
    {
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->news = $news;
        $this->newsCategory = $newsCategory;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        // dd($newsCategory);

        // return view('pages.admin.index', compact('authors', 'users', 'news_count', 'categories', 'news', 'authors1'));
        return view('pages.user.berlangganan.index', compact('categories', 'subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(subcribe $subcribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subcribe $subcribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subcribe $subcribe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subcribe $subcribe)
    {
        //
    }
}
