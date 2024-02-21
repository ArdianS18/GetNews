<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;
    private NewsService $service;

    public function __construct(NewsInterface $news, SubCategoryInterface $subCategory, NewsService $service)
    {
        $this->news = $news;
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
    public function create(NewsRequest $request, NewsService $service)
    {
        $news = new News();
        $news->name = $request->input('name');
        $news->content = $request->input('content');
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
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
