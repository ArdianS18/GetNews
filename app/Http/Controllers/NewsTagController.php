<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\NewsTag;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\NewsTagInterface;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\TagInterface;

class NewsTagController extends Controller
{
    private CategoryInterface $category;
    private SubCategoryInterface $subCategory;
    private NewsTagInterface $newsTag;
    private NewsInterface $news;
    private TagInterface $tag;
    public function __construct(
        CategoryInterface $category,
        SubCategoryInterface $subCategory,
        NewsTagInterface $newsTag,
        NewsInterface $news,
        TagInterface $tag
    ) {
        $this->news = $news;
        $this->subCategory = $subCategory;
        $this->newsTag = $newsTag;
        $this->category = $category;
        $this->tag = $tag;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function show(Request $request, Tag $tag)
    {
        $request->merge(['tag_id' => $tag->id]);
        $news = $this->newsTag->search($request);
        $categories = $this->category->get();
        $totalCategories = $this->category->showWhithCount();
        $subCategories = $this->subCategory->get();
        $populars = $this->news->showWhithCount();
        $popularTags = $this->tag->getByPopular();

        return view('pages.user.tag.index', compact('tag','populars', 'totalCategories', 'subCategories', 'categories','news','popularTags'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsTag $newsTag)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsTag $newsTag)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsTag $newsTag)
    {
        //
    }
}
