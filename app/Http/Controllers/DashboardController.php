<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Author;
use Illuminate\View\View ;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Traits\CustomPaginateTrait;
use App\Http\Resources\UserResource;
use App\Contracts\Interfaces\FaqInterface;
use App\Contracts\Interfaces\TagInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\ViewInterface;
use App\Contracts\Interfaces\AuthorInterface;
use App\Contracts\Interfaces\CommentInterface;
use App\Contracts\Interfaces\NewsTagInterface;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\FollowerInterface;
use App\Contracts\Interfaces\NewsHasLikeInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;


class DashboardController extends Controller
{
    private NewsCategoryInterface $newsCategory;
    private FollowerInterface $followers;
    private AuthorInterface $author;
    private UserInterface $user;
    private CategoryInterface $category;
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;
    private FaqInterface $faq;
    private ViewInterface $view;
    private NewsTagInterface $newsTags;
    private TagInterface $tag;
    private NewsHasLikeInterface $newsHasLike;
    private CommentInterface $comment;

    use CustomPaginateTrait;


    public function __construct(TagInterface $tag,FollowerInterface $followers, ViewInterface $view,NewsCategoryInterface $newsCategory, UserInterface $user, AuthorInterface $author, NewsInterface $news, CategoryInterface $category, SubCategoryInterface $subCategory,FaqInterface $faq,NewsTagInterface $newsTags, NewsHasLikeInterface $newsHasLike,CommentInterface $comment)
    {
        $this->user = $user;
        $this->author = $author;
        $this->category = $category;
        $this->subCategory = $subCategory;
        $this->news = $news;
        $this->faq = $faq;
        $this->followers = $followers;
        $this->tag = $tag;
        $this->newsTags = $newsTags;

        $this->newsCategory = $newsCategory;
        $this->view = $view;
        $this->newsHasLike = $newsHasLike;
        $this->comment = $comment;
    }

    public function index(){
        $users = $this->user->whereRelation();

        $authors = $this->author->get()->count();
        $news_count = $this->news->get()->count();
        $authors1 = $this->author->showWhithCount();

        $news = $this->news->getAllNews();
        $categories = $this->category->showWhithCount();
        $news2 = $this->news->showCountMonth();
        $newsCategory = $this->newsCategory->trending();

        return view('pages.admin.index', compact('authors', 'users', 'news_count', 'categories', 'news', 'authors1', 'news2'));
    }

    public function home(){
        $newsTrending = $this->news->get();
        $news = $this->news->get();
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        $trendings = $this->view->trending();

        $news_left = $this->news->getByLeft();
        $news_right = $this->news->getByRight();
        $news_mid = $this->news->getByMid();

        $populars = $this->news->getByPopular('up');
        $popular_post = $this->news->showWhithCount();
        $news_recent = $this->news->latest();
        $editor_pick = $this->newsCategory->get();
        $picks = $this->news->getByPick();
        $generals = $this->news->getByGeneral();
        $tags = $this->tag->getByPopular();
        $totalCategories = $this->category->showWhithCount();
        $authors = $this->author->get();
        $news_latests = $this->news->latest();
        $news_latests2 = $this->news->latest2();

        $most_populer = $this->news->getByPopular('down');
        $most_populer2 = $this->news->getByPopular('side');
        $categorypopuler = $this->category->showWhithCount();

        return view('pages.index',compact('news', 'categorypopuler', 'most_populer', 'most_populer2',
                                            'news_left', 'news_mid', 'news_right', 'categories',
                                            'subCategories','trendings', 'news_recent', 'populars',
                                            'editor_pick', 'generals', 'popular_post', 'picks','tags',
                                            'totalCategories','authors', 'news_latests', 'news_latests2'));
    }

    public function navbar(Request $request){
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();

        $news = $this->news->get();
        $query = $request->input('search');
        $newsSearch = $this->news->searchAll($request, $query);
        return view('layouts.user.navbar-header', compact('categories', 'subCategories','newsSearch'));
    }


    public function mobileHeader(){
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('layouts.user.mobile-navbar', compact('categories', 'subCategories'));
    }

    public function userProfile(){
        $following = $this->followers->get()->where('user_id', auth()->user()->id)->count();
        return view('pages.user.profile.index', compact('following'));
    }

    public function authoruser(Request $request) {
        $authors = $this->author->showWhithCountSearch($request);
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.author.index', compact('categories', 'subCategories', 'authors'));
    }

    public function aboutus() {
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.about.index', compact('categories', 'subCategories'));
    }

    public function newspost(Request $request) {
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        $totalCategories = $this->category->showWhithCount();
        $query = $request->input('search');
        $newsByDate = $this->news->whereDate($request);
        $populars = $this->news->getByPopular('up');
        $news = $this->news->get();
        return view('pages.user.news.news', compact('categories', 'subCategories','news','totalCategories','newsByDate','populars'));
    }

    public function authordetail($id) {
        $user = $this->user->show($id);
        $author = $this->author->where($user);

        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        $authors = Author::with('user')->where($author);
        $totalCategories = $this->category->showWhithCount();
        $news = $this->news->authorGetNews($user);
        $newsId = $news->pluck('id');
        $comments = $this->comment->where($newsId);
        $newsCount = $this->news->get();
        $authors = $this->author->get();
        $news = $this->news->get();

        return view('pages.user.author.detail-author', compact('categories', 'author','subCategories','authors','totalCategories','newsCount','news', 'comments'));
    }

    public function privacypolicy() {
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();
        return view('pages.user.privacy-policy.index', compact('categories', 'subCategories'));
    }

    public function faq() : View {
        $faqs = $this->faq->get();
        $categories = $this->category->get();
        $subCategories = $this->subCategory->get();

        return view('pages.contact.faq',compact('faqs','categories', 'subCategories'));
    }

    public function createAccount(Request $request)
    {
        $users = $this->user->customPaginate($request,10);
        $data['paginate'] = $this->customPaginate($users->currentPage(), $users->lastPage());
        $data['data'] = UserResource::collection($users);
        return ResponseHelper::success($data);
    }
}
