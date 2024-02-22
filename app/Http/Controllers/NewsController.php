<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Services\NewsService;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;
    private NewsService $NewsService;
    public function __construct(NewsInterface $news,SubCategoryInterface $subCategory, NewsService $NewsService)
    {
        $this->news = $news;
        $this->subCategory = $subCategory;
        $this->NewsService = $NewsService;
        
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
        // dd($request);
        // $data['user_id'] = auth()->id();
        $data = $this->NewsService->store($request);

        $this->news->store($data);

        // $this->news->store($store);
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
            'news' => $news->news,
            'categories' => $this->news->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $news = $this->news->get();

        return view('auth.pages.news.news', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsUpdateRequest $request, News $news)
    {
        $data = $this->NewsService->update($request, $news);
        $this->news->update($news->id, $data);
        return back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        $this->news->delete($news->id);
        $this->NewsService->remove($news->photo);

        return back();
    }
}