<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\SubscribeInterface;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscribe;
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
        $categories =  $this->category->get();
        $subCategories = $this->subCategory->get();
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
    public function show(Subscribe $subscribe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subscribe $subscribe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubscribeRequest $request, Subscribe $subscribe)
    {
        // $this->subscribe->update(($request->validated()));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subscribe $subscribe)
    {
        //
    }
}
