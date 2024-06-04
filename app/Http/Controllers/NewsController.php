<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AuthorInterface;
use Illuminate\Support\Str;
use App\Models\News;
use App\Models\NewsPhoto;
use Illuminate\Http\Request;
use App\Enums\NewsStatusEnum;
use App\Services\NewsService;
use App\Helpers\ResponseHelper;
use App\Http\Requests\NewsRequest;
use Illuminate\Contracts\View\View;
use App\Http\Resources\NewsResource;
use App\Services\NewsTrendingService;
use App\Http\Requests\NewsUpdateRequest;
use App\Contracts\Interfaces\TagInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\ViewInterface;
use App\Contracts\Interfaces\CommentInterface;
use App\Contracts\Interfaces\NewsTagInterface;
use App\Contracts\Repositories\NewsRepository;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsPhotoInterface;
use App\Contracts\Interfaces\NewsHasLikeInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsRejectInterface;
use App\Contracts\Interfaces\NewsSubCategoryInterface;
use App\Contracts\Interfaces\VisitorInterface;
use App\Http\Requests\NewsDraftRequest;
use App\Models\Author;
use App\Models\Comment;
use App\Models\NewsCategory;
use App\Models\NewsHasLike;
use App\Models\NewsReject;
use App\Models\NewsReport;
use App\Models\NewsSubCategory;
use App\Models\NewsTag;
use App\Models\Report;
use App\Models\View as ModelsView;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\JsonResponse;

class NewsController extends Controller
{
    private NewsCategoryInterface $newsCategory;
    private NewsSubCategoryInterface $newsSubCategory;
    private NewsTagInterface $newsTag;

    private NewsRejectInterface $newsReject;
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
    private NewsCategoryInterface $newsCategories;
    private AuthorInterface $author;

    private VisitorInterface $visitor;

    protected $newsRepositoty;

    public function __construct(
        TagInterface $tags,
        UserInterface $user,
        NewsRepository $newsRepository,
        NewsInterface $news,
        SubCategoryInterface $subCategory,
        CategoryInterface $category,

        NewsService $NewsService,
        NewsTrendingService $newsTrendingService,

        CommentInterface $comment,
        ViewInterface $view,
        NewsRejectInterface $newsReject,
        NewsTagInterface $newsTag,
        NewsHasLikeInterface $newsHasLike,
        NewsCategoryInterface $newsCategory,
        NewsSubCategoryInterface $newsSubCategory,

        NewsPhotoInterface $newsPhoto,
        NewsCategoryInterface $newsCategories,

        VisitorInterface $visitor,
        AuthorInterface $author)
    {
        $this->newsCategory = $newsCategory;
        $this->newsSubCategory = $newsSubCategory;
        $this->newsTag = $newsTag;
        $this->newsReject = $newsReject;
        $this->visitor = $visitor;

        $this->tags = $tags;
        $this->news = $news;
        $this->view = $view;
        $this->newsPhoto = $newsPhoto;
        $this->subCategory = $subCategory;
        $this->newsHasLike = $newsHasLike;
        $this->user = $user;
        $this->comment = $comment;
        $this->category = $category;
        $this->category = $category;

        $this->NewsService = $NewsService;
        $this->newsTrendingService = $newsTrendingService;
        $this->newsPhoto = $newsPhoto;

        $this->newsRepositoty = $newsRepository;
        $this->newsCategories = $newsCategories;
        $this->author = $author;

    }

    public function see(Request $request, News $news)
    {
        if ($request->has('page')) {
            $news = $this->news->customPaginate2($request, 10);
            $data['paginate'] = [
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
            ];
            $data['data'] = NewsResource::collection($news);
        } else {
            $news = $this->news->search($request);
            $data = NewsResource::collection($news);
        }
        return ResponseHelper::success($data);
    }

    public function listapproved(Request $request, News $news)
    {
        if ($request->has('page')) {
            $news = $this->news->customPaginate($request, 10);
            $data['paginate'] = [
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
            ];
            $data['data'] = NewsResource::collection($news);
        } else {
            $news = $this->news->search($request);
            $data = NewsResource::collection($news);
        }
        return ResponseHelper::success($data);
    }

    public function detailnews($newsId)
    {
        $news = $this->news->where($newsId);

        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $newsPhoto = $this->newsPhoto->get()->whereIn('news_id', $news);

        $tags = $this->tags->get();
        $newsCategories = $this->newsCategory->get()->whereIn('news_id', $news);
        $newsSubCategories = $this->newsSubCategory->get()->whereIn('news_id', $news);
        $newsTags = $this->newsTag->getNewsTags($news);

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

    public function usernews(Request $request,$year,$mounth,$day,$slug)
    {
        $ip = $request->getClientIp();

        $news = $this->news->showWithSlug($slug);
        $newsId = $news->id;
        $content = $news->content;

        $view = $this->view->store([
            'news_id' => $newsId,
            'ip' => $ip,
        ]);

        $userLike = $this->newsHasLike->where($news->id);
        $newsLike = $this->newsHasLike->countLikePost($newsId);

        $comments = $this->comment->whereIn($newsId);

        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $users = $this->user->get();
        $newsPhoto = $this->newsPhoto->where($newsId);
        if (Auth::check()) {
            $likedByUser = $userLike->contains(auth()->user()->id);
        } else {
            $likedByUser = null;
        }
        $news_recents = $this->news->latest();
        $populars = $this->view->getByPopular('up');
        $totalCategories = $this->category->showWhithCount();
        $tags = $this->newsTag->show($newsId);
        $category_id = $this->newsCategories->get()->whereIn('news_id', $news)->pluck('category_id')->first();
        $newsCategories = $this->news->getById($category_id);
        $authors = $this->author->get();
        $tagPopulars = $this->tags->getByPopular();
        if ($this->news->findUser($news->user_id)) {
            $relatedNews = $this->news->findUser($news->user_id);
        }else{
            $relatedNews = $this->news->get()->inRandomOrder()->first();
        }


        $visitorId = $request->cookie('visitor_id');
        if (!$visitorId) {
            $visitorId = Str::random(30);
            $this->visitor->store(['visitor_id'=> $visitorId,'last_visit'=>now()]);
            return response()->view('pages.user.news.singlepost', compact('users', 'news','newsId','relatedNews',
                'subCategories','categories','newsPhoto','comments', 'newsLike',
                'likedByUser','tags','totalCategories','populars','news_recents',
                'newsCategories','authors','tagPopulars'))->cookie('visitor_id', $visitorId, 60 * 24 * 30);
        }

        $this->visitor->store(['visitor_id'=> $visitorId,'last_visit'=>now()]);
        return response()->view('pages.user.news.singlepost', compact('users', 'news','newsId','relatedNews',
            'subCategories','categories','newsPhoto','comments', 'newsLike',
            'likedByUser','tags','totalCategories','populars','news_recents',
            'newsCategories','authors','tagPopulars'))->cookie('visitor_id', $visitorId, 60 * 24 * 30);
    }

    /**
     * Display a listing of the resource.
     */
    public function approved(News $news)
    {
        $data['status'] = NewsStatusEnum::ACTIVE->value;
        $this->news->update($news->id, $data);
        return redirect('/news-list')->with('success', 'Berhasil menerima Artikel.');
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

    public function reject(News $news, Request $request)
    {
        $data['status'] = NewsStatusEnum::NONACTIVE->value;
        $this->news->update($news->id, $data);

        $this->newsReject->store([
            'user_id' => auth()->user()->id,
            'news_id' => $news->id,
            'massage' => $request->input('massage')
        ]);

        return redirect('/news-list');
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

        return to_route('news.approve.admin');
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

    public function showCategories($slug, Request $request, NewsCategory $newsCategory)
    {
        $request->merge([
            'name' => $newsCategory->id,
        ]);

        $category = $this->category->showWithSlug($slug);
        $categoryId = $category->id;
        $subCategory = $this->subCategory->where($categoryId);

        $categories = $this->category->get();
        $totalCategories = $this->category->showWhithCount();
        $subCategories = $this->subCategory->get();
        $news = $this->news->showWhithCount();

        $query = $request->input('search');
        $newsCategories = $this->newsCategory->search($category->id, $query);

        $popular = $this->news->newsCategory($categoryId);
        $new_news = $this->news->newsCategorySearch($category->id, $query, 'terbaru', '5');
        $trending = $this->news->newsCategorySearch($category->id, $query, 'trending', '5');
        return view('pages.user.news.category', compact('trending','new_news','popular','news', 'totalCategories','subCategories','categories','category', 'subCategory', 'newsCategories'));
    }

    public function showSubCategories($category,$subCategory,Request $request)
    {

        $subCategory = $this->subCategory->showWithSlug($subCategory);
        $subCategoryId = $subCategory->id;

        $categories = $this->category->get();
        $totalCategories = $this->category->showWhithCount();
        $subCategories = $this->subCategory->get();

        $query = $request->input('search');
        $newsSubCategories = $this->newsSubCategory->search($subCategory->id, $query);
        $news = $this->news->showWhithCount();

        $popular = $this->news->newsCategory($subCategoryId);
        $new_news = $this->news->newsSubCategorySearch($subCategory->id, $query, 'terbaru', '5');
        $trending = $this->news->newsSubCategorySearch($subCategory->id, $query, 'trending', '5');
        return view('pages.user.news.subcategory', compact('trending','new_news','popular','totalCategories','subCategories','categories','subCategory','newsSubCategories', 'news'));
    }

    public function showAllCategories($slug, $data, Request $request, NewsCategory $newsCategory)
    {
        $request->merge([
            'name' => $newsCategory->id,
        ]);

        $category = $this->category->showWithSlug($slug);
        $categoryId = $category->id;
        $subCategory = $this->subCategory->where($categoryId);

        $categories = $this->category->get();
        $totalCategories = $this->category->showWhithCount();
        $subCategories = $this->subCategory->get();
        $news = $this->news->showWhithCount();

        $query = $request->input('search');
        $newsCategories = $this->newsCategory->search($category->id, $query);

        $popular = $this->news->newsCategory($categoryId);
        $trending = $this->news->newsCategorySearch($category->id, $query, $data, '10');
        return view('pages.user.news.all-category', compact('popular', 'data','trending','news', 'totalCategories','subCategories','categories','category', 'subCategory', 'newsCategories'));
    }

    public function showAllSubCategories($subslug, $data, Request $request, NewsSubCategory $newsSubCategory)
    {
        $request->merge([
            'name' => $newsSubCategory->id,
        ]);

        $category = $this->subCategory->showWithSlug($subslug);
        $categoryId = $category->id;
        $subCategory = $this->subCategory->where($categoryId);

        $categories = $this->category->get();
        $totalCategories = $this->category->showWhithCount();
        $subCategories = $this->subCategory->get();
        $news = $this->news->showWhithCount();

        $query = $request->input('search');
        $newsCategories = $this->newsCategory->search($category->id, $query);
        $trending = $this->news->newsSubCategorySearch($category->id, $query, $data, '10');
        return view('pages.user.news.all-subcategory', compact('data','trending','news', 'totalCategories','subCategories','categories','category', 'subCategory', 'newsCategories'));
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $data = $this->NewsService->store($request);

        if ($this->news->findBySlug($data['slug'])) {
            session()->flash('error', 'Judul sudah digunakan, Mohon untuk ubah judulnya');
            return redirect()->back()->withInput();
        }

        if (auth()->user()->roles->pluck('name')[0] == "admin") {
            $data['status'] = NewsStatusEnum::ACTIVE->value;
        }

        $newsId = $this->news->store($data)->id;

        foreach ($data['category'] as $category) {
            $this->newsCategory->store([
                'news_id' => $newsId,
                'category_id' => $category
            ]);
        }

        foreach ($data['sub_category'] as $subCategory) {
            $this->newsSubCategory->store([
                'news_id' => $newsId,
                'sub_category_id' => $subCategory
            ]);
        }

        foreach ($data['tag'] as $tagId) {
            $this->newsTag->store([
                'news_id' => $newsId,
                'tag_id' => $tagId
            ]);
        }

        if (auth()->user()->roles->pluck('name')[0] == "admin") {
            return to_route('news.approve.admin');
        } else {
            return to_route('status.news.author')->with('success', 'Berhasil menambahkan Artikel.');
        }
    }

    public function storeDraft(NewsDraftRequest $request)
    {
        $data = $this->NewsService->storeDraft($request);
        $data['status'] = NewsStatusEnum::NEWSDRAFT->value;
        $newsId = $this->news->store($data)->id;

        if ($data['category']) {
            foreach ($data['category'] as $category) {
                $this->newsCategory->store([
                    'news_id' => $newsId,
                    'category_id' => $category
                ]);
            }
        }

        if ($data['sub_category']) {
            foreach ($data['sub_category'] as $subCategory) {
                $this->newsSubCategory->store([
                    'news_id' => $newsId,
                    'sub_category_id' => $subCategory
                ]);
            }
        }

        if ($data['tag']) {
            foreach ($data['tag'] as $tagId) {
                $this->newsTag->store([
                    'news_id' => $newsId,
                    'tag_id' => $tagId
                ]);
            }
        }

        if (auth()->user()->roles->pluck('name')[0] == "admin") {
            return to_route('news.approve.admin');
        } else {
            return to_route('status.news.author')->with('draft', 'Berhasil meyimpan Artikel.');
        }

    }

    public function updateDraft(NewsDraftRequest $request, News $news, NewsPhoto $newsPhoto, NewsCategory $newsCategory, NewsSubCategory $newsSubCategory, NewsTag $newsTag)
    {
        $data = $this->NewsService->updateDraft($request, $news);
        $data['status'] = NewsStatusEnum::NEWSDRAFT->value;
        $this->news->update($news->id, $data);

        $newsCategory->where('news_id', $news->id)->delete();
        if ($data['category']) {
            foreach ($data['category'] as $category) {
                $this->newsCategory->store([
                    'news_id' => $news->id,
                    'category_id' => $category
                ]);
            }
        }

        $newsSubCategory->where('news_id', $news->id)->delete();
        if ($data['sub_category']) {
            foreach ($data['sub_category'] as $subCategory) {
                $this->newsSubCategory->store([
                    'news_id' => $news->id,
                    'sub_category_id' => $subCategory
                ]);
            }
        }

        $newsTag->where('news_id', $news->id)->delete();
        if ($data['tag']) {
            foreach ($data['tag'] as $tagId) {
                $this->newsTag->store([
                    'news_id' => $news->id,
                    'tag_id' => $tagId
                ]);
            }
        }

        if (auth()->user()->roles->pluck('name')[0] == "admin") {
            return to_route('news.approve.admin');
        } else {
            return to_route('status.news.author')->with('draft', 'Berhasil update dan meyimpan Artikel.');
        }

    }

    public function createUserNews()
    {
        $tags = $this->tags->get();
        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $news = $this->news->get();
        return view('pages.user.news.pengajuan', compact('tags','news','subCategories','categories'));
    }

    public function storeNews(NewsRequest $request)
    {
        $data = $this->NewsService->store($request);
        $newsId = $this->news->store($data)->id;

        foreach ($data['category'] as $category) {
            $this->newsCategory->store([
                'news_id' => $newsId,
                'category_id' => $category
            ]);
        }

        foreach ($data['sub_category'] as $subCategory) {
            $this->newsSubCategory->store([
                'news_id' => $newsId,
                'sub_category_id' => $subCategory
            ]);
        }

        foreach ($data['tags'] as $tagId) {
            $this->newsTag->store([
                'news_id' => $newsId,
                'tag_id' => $tagId
            ]);
        }

        return to_route('status.news.author');
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
       //
    }

    public function softDelete(News $news) : JsonResponse {
        $this->news->softDelete($news);
        return ResponseHelper::success(trans('alert.delete_success'));
    }

    public function restore(News $news) {
        $this->news->restore($news);
        return ResponseHelper::success(trans('alert.delete_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news, NewsPhoto $newsPhoto, NewsCategory $newsCategory, NewsSubCategory $newsSubCategory, NewsTag $newsTag, NewsHasLike $newsHasLike, NewsReject $newsReject, Comment $newsComment, NewsReport $newsReport, ModelsView $view ,Report $report)
    {
        $id = $news->id;

        $newsCategory->where('news_id', $id)->delete();
        $newsSubCategory->where('news_id', $id)->delete();
        $newsTag->where('news_id', $id)->delete();
        $newsHasLike->where('news_id', $id)->delete();
        $newsReject->where('news_id', $id)->delete();
        $newsComment->where('news_id', $id)->delete();
        $newsReport->where('news_id', $id)->delete();
        $view->where('news_id', $id)->delete();

        $relatedReports = $report->where('news_id', $id)->get();
        foreach ($relatedReports as $relatedReport) {
            $relatedReport->delete();
        }

        $news->delete();

        return back()->with('success', trans('alert.delete_success'));
    }

    public function showmynews(Request $request, NewsCategory $newsCategories)
    {
        $id = auth()->user()->id;
        $author_id = Author::where('user_id', $id)->value('id');
        $news = $this->newsCategory->searchAuthor($author_id, $request);

        return view('pages.author.news.index', compact('news'));
    }

    public function showstatusnews(Request $request, News $news)
    {
        $id = auth()->user()->id;
        if ($request->has('page')) {
            $news = $this->news->searchStatus($id, $request, 10, "false");
            $data['paginate'] = [
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
            ];
            $data['data'] = NewsResource::collection($news);
        } else {
            $news = $this->news->searchStatus($id, $request, 10, "false");
            $data['paginate'] = [
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
            ];
            $data['data'] = NewsResource::collection($news);
        }
        return ResponseHelper::success($data);
    }

    public function showdeleteartikel(Request $request, News $news)
    {
        $id = auth()->user()->id;
        if ($request->has('page')) {
            $news = $this->news->getDelete($id, $request, 10, "true");
            $data['paginate'] = [
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
            ];
            $data['data'] = NewsResource::collection($news);
        }
        return ResponseHelper::success($data);
    }
}
