<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\CommentInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsHasLikeInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\NewsPhotoInterface;
use App\Contracts\Interfaces\NewsSubCategoryInterface;
use App\Contracts\Interfaces\NewsTagInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\TagInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\ViewInterface;
use App\Contracts\Repositories\NewsRepository;
use App\Enums\NewsPrimaryEnum;
use App\Enums\NewsStatusEnum;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsStatusRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Models\News;
use App\Models\NewsPhoto;
use App\Models\NewsTag;
use App\Models\User;
use App\Services\NewsService;
use App\Services\NewsTrendingService;
use Dotenv\Parser\Value;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class NewsController extends Controller
{
    private NewsCategoryInterface $newsCategory;
    private NewsSubCategoryInterface $newsSubCategory;
    private NewsTagInterface $newsTag;

    private NewsInterface $news;
    private UserInterface $user;
    private CommentInterface $comment;
    private CategoryInterface $category;
    private SubCategoryInterface $subCategory;
    private NewsPhotoInterface $newsPhoto;
    private NewsHasLikeInterface $newsHasLike;
    private ViewInterface $view;
    private TagInterface $tags;
    private NewsService $NewsService;
    private $newsTrendingService;

    protected $newsRepositoty;

    public function __construct(TagInterface $tags, NewsCategoryInterface $newsCategory, NewsSubCategoryInterface $newsSubCategory, NewsTagInterface $newsTag,ViewInterface $view, NewsHasLikeInterface $newsHasLike ,CommentInterface $comment, UserInterface $user, NewsRepository $newsRepository, NewsInterface $news, SubCategoryInterface $subCategory, CategoryInterface $category,NewsService $NewsService, NewsTrendingService $newsTrendingService, NewsPhotoInterface $newsPhoto)
    {
        $this->newsCategory = $newsCategory;
        $this->newsSubCategory = $newsSubCategory;
        $this->newsTag = $newsTag;

        $this->tags = $tags;
        $this->news = $news;
        $this->view = $view;
        $this->newsPhoto = $newsPhoto;
        $this->subCategory = $subCategory;
        $this->newsHasLike = $newsHasLike;
        $this->user = $user;
        $this->comment = $comment;
        $this->category = $category;
        $this->NewsService = $NewsService;
        $this->category = $category;
        $this->newsTrendingService = $newsTrendingService;
        $this->newsPhoto = $newsPhoto;

        $this->newsRepositoty = $newsRepository;

    }

    public function see(Request $request, News $news)
    {
        $request->merge([
            'category_id' => $news->id,
            'sub_category_id' => $news->id
        ]);

        $search = $request->input('search');
        $status = $request->input('status');
        $searchTerm = $request->input('search', '');

        // $subCategories = $this->subCategory->get();
        // $news = $this->news->whereIn("panding", false, $request);
        $news = $this->news->search($request)->whereIn('status', "panding");
        // $news->appends(['search' => $searchTerm]);
        return view('pages.admin.news_admin.index', compact('news', 'search', 'status'));
    }

    public function listapproved(Request $request, News $news)
    {
        $request->merge([
            'category_id' => $news->id,
            'sub_category_id' => $news->id
        ]);

        $search = $request->input('search');
        $status = $request->input('status');

        $searchTerm = $request->input('search', '');

        // $subCategories = $this->subCategory->get();
        // $news = $this->news->whereIn("active", false, $request);
        // $news->appends(['search' => $searchTerm]);
        $news = $this->news->search($request)->where('status', "active");
        return view('pages.admin.news_admin.news-approve', compact('news', 'search', 'status'));
    }

    public function detailnews($newsId)
    {
        $news = $this->news->where($newsId);

        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $newsPhoto = $this->newsPhoto->where($news);

        $tags = $this->tags->get();

        $newsCategories = $this->newsCategory->get()->whereIn('news_id', $news);
        $newsSubCategories = $this->newsSubCategory->get()->whereIn('news_id', $news);
        $newsTags = $this->newsTag->get()->whereIn('news_id', $news);

        return view('pages.admin.news_admin.detail-news', compact('news','tags','newsCategories','newsSubCategories','subCategories','newsTags','categories','newsPhoto'));
    }

    public function createnews()
    {
        $tags = $this->tags->get();
        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $news = $this->news->get();
        return view('pages.author.news.create', compact('tags','news','subCategories','categories'));
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

    public function usernews(Request $request ,$slug, $page)
    {
        $news = $this->news->showWithSlug($slug);
        $newsId = $news->id;
        $content = $news->content;
        $pages = str_split($content, 100000);
        $currentPage = $page-1;

        $view = $this->view->store([
            'news_id' => $news->id,
            'created_at' => now()
        ],[
            'news_id' => $news->id,
            'created_at' => now()
        ]);

        $newsLike = $this->newsHasLike->where($news)->count();
        $comments = $this->comment->where($news);
        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $users = $this->user->get();
        $newsPhoto = $this->newsPhoto->where($newsId);

        return view('pages.user.news.singlepost', compact('users', 'news','subCategories','categories','newsPhoto','comments', 'newsLike', 'pages', 'currentPage'));
    }

    /**
     * Display a listing of the resource.
     */
    public function approved(News $news)
    {
        $data['status'] = NewsStatusEnum::ACTIVE->value;
        $this->news->update($news->id, $data);
        return redirect('approved-news');
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
        $selectedIds = json_decode($request->input('checkedIdss'));
        foreach ($selectedIds as $id) {
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

        return to_route('list.approved');
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

    public function showViews(){
        $subCategories = $this->subCategory->get();
        $news = $this->news->get();

        return view('pages.user.index', compact('news','subCategories'));
    }

    public function showCategories($slug){
        $category = $this->category->showWithSlug($slug);
        $categoryId = $category->id;
        $subCategory = $this->subCategory->where($categoryId);


        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        $news = $this->news->get()->whereIn('category_id', $categoryId);

        return view('pages.user.news.category', compact('news','subCategories','categories','category', 'subCategory'));
    }

    public function showSubCategories($slug){
        $subCategory = $this->subCategory->showWithSlug($slug);

        $categories = $this->category->get();
        $totalCategories = $this->category->showWhithCount();
        $subCategories = $this->subCategory->get();

        return view('pages.user.news.subcategory', compact('totalCategories','subCategories','categories','subCategory'));
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

        if(auth()->user()?->id != $news->user_id){
            $news->query()->increment('views');
        }
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
    public function destroy(News $news, NewsPhoto $newsPhoto)
    {
        $relatedPhotos = $newsPhoto->whereHas('news', function ($query) use ($news) {
            $query->where('id', $news->id);
        })->get();

        foreach ($relatedPhotos as $photo) {
            $this->NewsService->remove($photo->multi_photo);
            $photo->delete();
        }

        $news->delete();

        return back();
    }



}
