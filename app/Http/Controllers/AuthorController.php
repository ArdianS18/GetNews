<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Services\AuthorService;
use App\Http\Requests\AuthorRequest;
use App\Contracts\Interfaces\AuthorInterface;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\NewsPhotoInterface;
use App\Contracts\Interfaces\NewsSubCategoryInterface;
use App\Contracts\Interfaces\NewsTagInterface;
use App\Contracts\Interfaces\RegisterInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\TagInterface;
use App\Enums\RoleEnum;
use App\Enums\UserStatusEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\AuthorsRequest;
use App\Http\Resources\AuthorResource;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsHasLike;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\View;
use App\Services\Auth\RegisterService;
use App\Services\AuthorBannedService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

use function Laravel\Prompts\alert;

class AuthorController extends Controller
{
    private AuthorInterface $author;
    private RegisterInterface $register;
    private NewsInterface $news;

    private CategoryInterface $categories;
    private SubCategoryInterface $subCategories;
    private TagInterface $tags;
    private NewsTagInterface $newsTags;
    private NewsCategoryInterface $newsCategories;
    private NewsSubCategoryInterface $newsSubCategories;
    private NewsPhotoInterface $newsPhoto;

    private AuthorService $authorService;
    private RegisterService $serviceregister;
    private $authorBannedService;


    public function __construct(NewsTagInterface $newsTags, NewsPhotoInterface $newsPhoto, CategoryInterface $categories, SubCategoryInterface $subCategories, NewsCategoryInterface $newsCategories, NewsSubCategoryInterface $newsSubCategories, TagInterface $tags, NewsInterface $news,AuthorInterface $author, AuthorService $authorService, RegisterService $serviceregister, RegisterInterface $register, AuthorBannedService $authorBannedService)
    {
        $this->author = $author;
        $this->register = $register;

        $this->news = $news;
        $this->categories = $categories;
        $this->subCategories = $subCategories;
        $this->tags = $tags;
        $this->newsTags = $newsTags;
        $this->newsCategories = $newsCategories;
        $this->newsSubCategories = $newsSubCategories;
        $this->newsPhoto = $newsPhoto;

        $this->authorService = $authorService;
        $this->authorBannedService = $authorBannedService;
        $this->serviceregister = $serviceregister;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Author $author)
    {
        if ($request->has('page')) {
            $author = $this->author->customPaginate($request, 10);
            $data['paginate'] = [
                'current_page' => $author->currentPage(),
                'last_page' => $author->lastPage(),
            ];
            $data['data'] = AuthorResource::collection($author);
        } else {
            $author = $this->author->search($request);
            $data = AuthorResource::collection($author);
        }
        return ResponseHelper::success($data);
    }

    public function listauthor(Request $request, Author $author)
    {
        if ($request->has('page')) {
            $author = $this->author->customPaginate2($request, 10);
            $data['paginate'] = [
                'current_page' => $author->currentPage(),
                'last_page' => $author->lastPage(),
            ];
            $data['data'] = AuthorResource::collection($author);
        }else{
            $author = $this->author->search($request);
            $data = AuthorResource::collection($author);
        }
        return ResponseHelper::success($data);
    }

    public function listbanned(Request $request, Author $author)
    {
        $request->merge([
            'user_id' => $author->id
        ]);

        $search = $request->input('search');
        $status = $request->input('status');
        $searchTerm = $request->input('search', '');

        $authors = $this->author->whereIn("reject", true, $request);
        $authors->appends(['search' => $searchTerm]);

        // $authors = $this->author->search($request)->where('status', 'reject')->where('banned', true);
        return view('pages.admin.user.author-ban', compact('authors', 'search', 'status'));
    }

    public function approved(Author $author, $authorId)
    {
        $data['status'] = UserStatusEnum::APPROVED->value;
        $author = Author::find($authorId);

        if ($author) {
            $author->update($data);

            $user = $author->user;
            $authorRole = Role::where('name', 'author')->first();

        if ($user && $authorRole) {
            $user->roles()->sync([$authorRole->id]);
        }
    }

    return ResponseHelper::success($data);
    }

    public function reject(Author $author, $authorId)
    {
        $data['status'] = UserStatusEnum::REJECT->value;
        $this->author->update($authorId, $data);
        return ResponseHelper::success($data);
    }

    public function banned(Author $author)
    {
        if (!$author->banned) {
            $this->authorBannedService->banned($author);

        } else {
            $this->authorBannedService->unBanned($author);
        }

        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(RegisterRequest $request, User $user)
    {
        $data = $this->authorService->store($request, $user);
        $this->author->store($data);

        return back();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RegisterRequest $request)
    {
        $data = $this->serviceregister->registerWithAdmin($request);
        $user = $this->register->store($data);
        $userId = $user->assignRole(RoleEnum::AUTHOR)->id;

        $img = $data['cv'];
        $this->author->store([
            'user_id' => $userId,
            'cv' => $img,
            'status' => "approved"
        ]);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    public function detailnews ($newsId)
    {
        $news = $this->news->showWithSlug($newsId);

        $subCategories = $this->subCategories->get();
        $categories = $this->categories->get();
        $newsPhoto = $this->newsPhoto->get()->whereIn('news_id', $news);

        $tags = $this->tags->get();
        $newsCategories = $this->newsCategories->get()->whereIn('news_id', $news);

        $newsSubCategories = $this->newsSubCategories->get()->whereIn('news_id', $news);
        $newsTags = $this->newsTags->get()->whereIn('news_id', $news);

        return view('pages.author.news.detail', compact('news','tags','newsCategories','newsSubCategories','subCategories','newsTags','categories','newsPhoto'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $data = $this->authorService->update($request, $author);
        $this->author->update($author->id, $data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $this->author->delete($author->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }

    public function incomestatistics()
    {
        return view('pages.author.statistic.income');
    }

    public function newsstatistics()
    {
        $news = $this->news->showWhithCount();
        $data_statistik = $this->news->showNewsStatistic();
        $view = View::count();
        $like = NewsHasLike::count();

        return view('pages.author.statistic.news', compact('news', 'view', 'like'));
    }
}
