<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Http\Requests\NewsRequest;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;
    private NewsService $service;
    public function __construct(NewsInterface $news,SubCategoryInterface $subCategory, NewsService $service)
    {
        $this->news = $news;
        $this->subCategory = $subCategory;
        $this->service = $service;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategories = $this->subCategory->get();
        $news = $this->news->get();
        return view('pages.news.index', compact('news','subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(NewsRequest $request)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $store = $this->service->store($request);
        $store['user_id'] = auth()->id();
        $this->news->store($store);
        return to_route('news.index');
    }

    /**
     * Display the specified resource
     */
    public function show(string $slug): View
    {
        $news = $this->news->showWithSlug($slug);

        return view('pages.article-detail', [
            'name' => $news->name,
            'photo' => $news->photo,
            'content' => $news->content,
            'sinopsis' => $news->sinopsis,
            'author' => $news->user->name,
            // 'news' => $news,
            'categories' => $this->news->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $news = $this->news->get();

        return view('auth.pages.news.news', compact('categories', 'article'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, News $news)
    {
        $store = $this->news->update($request, $news);

        $this->news->update($news->id, $store);

        return to_route('auth.pages.news.news');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $this->news->delete($news->id);
        $this->service->remove($news->photo);

        return back();
    }
}
