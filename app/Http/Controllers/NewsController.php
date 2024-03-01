<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\NewsPhotoInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Enums\NewsPrimaryEnum;
use App\Enums\NewsStatusEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsStatusRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Models\User;
use App\Services\NewsService;
use App\Services\NewsTrendingService;
use Dotenv\Parser\Value;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;
    private NewsService $NewsService;
    private $newsTrendingService;

    private CategoryInterface $category;
    private NewsPhotoInterface $newsPhoto;

    public function __construct(NewsInterface $news, SubCategoryInterface $subCategory, NewsService $NewsService, CategoryInterface $category, NewsTrendingService $newsTrendingService,  NewsPhotoInterface $newsPhoto)
    {
        $this->news = $news;
        $this->subCategory = $subCategory;
        $this->NewsService = $NewsService;
        $this->category = $category;
        $this->newsTrendingService = $newsTrendingService;
        $this->newsPhoto = $newsPhoto;

    }

    public function see(Request $request, News $news)
    {
        $request->merge([
            'sub_category_id' => $news->id
        ]);
        
        $subCategories = $this->subCategory->get();
        $news = $this->news->search($request);
        return view('pages.admin.news_admin.index', compact('news','subCategories'));
    }

    public function createnews()
    {
        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $news = $this->news->get();
        return view('pages.author.news.create', compact('news','subCategories','categories'));
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

    public function approved(News $news)
    {
        $data['status'] = NewsStatusEnum::ACTIVE->value;
        $this->news->update($news->id, $data);
        return back();
    }

    public function approvedall(Request $request, News $news)
    {
        $selectedIds = json_decode($request->input('checkedIds'));

        foreach ($selectedIds as $id) {
            $news = News::find($id);

            if ($news) {
                $news->status = NewsStatusEnum::ACTIVE->value;
                $news->save();
            }
        }

        return back();
    }

    public function reject(News $news)
    {
        $data['status'] = NewsStatusEnum::NONACTIVE->value;
        $this->news->update($news->id, $data);
        return back();
    }

    public function rejectall(Request $request, News $news)
    {
        $selected = json_decode($request->input('checkedIdss'));

        foreach ($selected as $id) {
            $news = News::find($id);

            if ($news) {
                $news->status = NewsStatusEnum::NONACTIVE->value;
                $news->save();
            }
        }

        return back();
    }


    public function trending(News $news, Request $request)
    {
        if (!$news->is_primary) {
            $this->newsTrendingService->markAsTrending($news);
        } else {
            $this->newsTrendingService->markAsNotTrending($news);
        }

        return back();
    }

    public function filter(Request $request)
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
    public function store(NewsRequest $request)
    {
        // dd($request);
        // $data['user_id'] = auth()->id();
        dd($request);
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
