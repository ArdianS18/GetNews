<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\SubscribeInterface;
use App\Http\Requests\SubscribeRequest;
use App\Models\subcribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    private NewsCategoryInterface $newsCategory;
    private SubscribeInterface $subscribe;
    private NewsInterface $news;
    private CategoryInterface $category;
    private SubCategoryInterface $subCategory;

    public function __construct(SubscribeInterface $subscribe, CategoryInterface $category, SubCategoryInterface $subCategory)
    {
        $this->subscribe = $subscribe;
        $this->category = $category;
        $this->subCategory = $subCategory;
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
    public function store(SubscribeRequest $request)
    {
        $this->subscribe->store(($request->validated()));
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
    public function update(SubscribeRequest $request, subcribe $subcribe)
    {
        $this->subscribe->update(($request->validated()));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subcribe $subcribe)
    {
        //
    }
}
