<?php

namespace App\Http\Controllers;

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
use App\Contracts\Interfaces\ReportInterface;
use App\Http\Requests\NewsDraftRequest;
use App\Http\Resources\NewsCategoryResource;
use App\Models\Author;
use App\Models\Comment;
use App\Models\NewsCategory;
use App\Models\NewsHasLike;
use App\Models\NewsReject;
use App\Models\NewsReport;
use App\Models\NewsSubCategory;
use App\Models\NewsTag;
use App\Models\Report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

        NewsPhotoInterface $newsPhoto)
    {
        $this->newsCategory = $newsCategory;
        $this->newsSubCategory = $newsSubCategory;
        $this->newsTag = $newsTag;
        $this->newsReject = $newsReject;

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
        ],[
            'created_at' => now()
        ]);

        $userLike = $this->newsHasLike->where($news->id);
        $newsLike = $this->newsHasLike->where($news->id)->count();
        $comments = $this->comment->where($newsId);
        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $users = $this->user->get();
        $newsPhoto = $this->newsPhoto->where($newsId);
        if (Auth::check()) {
            $likedByUser = $userLike->contains(auth()->user()->id);
        } else {
            $likedByUser = null;
        }
        $populars = $this->news->getByPopular();
        $totalCategories = $this->category->showWhithCount();
        $tags = $this->newsTag->show($newsId);

        return view('pages.user.news.singlepost', compact('users', 'news','subCategories','categories','newsPhoto','comments', 'newsLike', 'likedByUser', 'pages', 'currentPage','tags','totalCategories','populars'));
    }

    /**
     * Display a listing of the resource.
     */
    public function approved(News $news)
    {
        $data['status'] = NewsStatusEnum::ACTIVE->value;
        $this->news->update($news->id, $data);
        return redirect('/news-approved-list');
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
        // dd($news);
        $data['status'] = NewsStatusEnum::NONACTIVE->value;
        $this->news->update($news->id, $data);

        $this->newsReject->store([
            'user_id' => $news->author->user->id,
            'news_id' => $news->id,
            'massage' => $request->input('massage')
        ]);

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

    public function showCategories($slug, Request $request, NewsCategory $newsCategory){

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

        return view('pages.user.news.category', compact('news', 'totalCategories','subCategories','categories','category', 'subCategory', 'newsCategories'));
    }

    public function showSubCategories($slug, Request $request, NewsSubCategory $newsSubCategory)
    {
        $request->merge([
            'name' => $newsSubCategory->id,
        ]);

        $subCategory = $this->subCategory->showWithSlug($slug);

        $categories = $this->category->get()->take(6);
        $totalCategories = $this->category->showWhithCount();
        $subCategories = $this->subCategory->get();

        $query = $request->input('search');
        $newsSubCategories = $this->newsSubCategory->search($subCategory->id, $query);

        $news = $this->news->showWhithCount();

        return view('pages.user.news.subcategory', compact('totalCategories','subCategories','categories','subCategory','newsSubCategories', 'news'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
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

        if ($data['tags']) {
            foreach ($data['tags'] as $tagId) {
                $this->newsTag->store([
                    'news_id' => $newsId,
                    'tag_id' => $tagId
                ]);
            }
        }

        // if ($data['multi_photo']) {
        //     foreach ($data['multi_photo'] as $img) {
        //         $this->newsPhoto->store([
        //             'news_id' => $newsId,
        //             'multi_photo' => $img,
        //         ]);
        //     }
        // }

        return to_route('status.news.author');
    }

    public function updateDraft(NewsDraftRequest $request, News $news, NewsPhoto $newsPhoto, NewsCategory $newsCategory, NewsSubCategory $newsSubCategory, NewsTag $newsTag)
    {
        $data = $this->NewsService->updateDraft($request, $news);
        $data['status'] = NewsStatusEnum::NEWSDRAFT->value;
        $this->news->update($news->id, $data);

        // if ($request->hasFile('multi_photo')) {
        //     $newsPhoto->where('news_id', $news->id)->delete();
        //     foreach ($data['multi_photo'] as $photo) {
        //         $newsPhoto->create([
        //             'news_id' => $news->id,
        //             'multi_photo' => $photo
        //         ]);
        //     }
        // }

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
        if ($data['tags']) {
            foreach ($data['tags'] as $tagId) {
                $this->newsTag->store([
                    'news_id' => $news->id,
                    'tag_id' => $tagId
                ]);
            }
        }
        return to_route('status.news.author');
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

        // foreach ($data['multi_photo'] as $img) {
        //     $this->newsPhoto->store([
        //         'news_id' => $newsId,
        //         'multi_photo' => $img,
        //     ]);
        // }

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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news, NewsPhoto $newsPhoto, NewsCategory $newsCategory, NewsSubCategory $newsSubCategory, NewsTag $newsTag, NewsHasLike $newsHasLike, NewsReject $newsReject, Comment $newsComment, NewsReport $newsReport, Report $report)
    {
        $id = $news->id;
        // $this->news->delete($news);

        $newsCategory->where('news_id', $id)->delete();
        $newsSubCategory->where('news_id', $id)->delete();
        $newsTag->where('news_id', $id)->delete();
        $newsHasLike->where('news_id', $id)->delete();
        $newsReject->where('news_id', $id)->delete();
        $newsComment->where('news_id', $id)->delete();
        $newsReport->where('news_id', $id)->delete();

        // $relatedPhotos = $newsPhoto->where('news_id', $id)->get();

        // foreach ($relatedPhotos as $photo) {
        //     $this->NewsService->remove($photo->multi_photo);
        //     $photo->delete();
        // }

        $relatedReports = $report->where('news_id', $id)->get();
        foreach ($relatedReports as $relatedReport) {
            $relatedReport->delete();
        }

        $news->delete();

        return back()->with('success', trans('alert.delete_success'));
    }

    public function showmynews(Request $request, NewsCategory $newsCategories)
    {
        // $query = $request->input('search');
        $id = auth()->user()->id;
        $author_id = Author::where('user_id', $id)->value('id');
        $news = $this->newsCategory->searchAuthor($author_id, $request);

        return view('pages.author.news.index', compact('news'));
    }

    public function showstatusnews(Request $request, NewsCategory $newsCategories)
    {
        // $news = $this->newsCategory->get();
        $id = auth()->user()->id;
        $news = $this->news->searchStatus($id, $request);
        return view('pages.author.status.index', compact('news'));
    }
}
