<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Services\AuthorService;
use App\Http\Requests\AuthorRequest;
use App\Contracts\Interfaces\AuthorInterface;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\CommentInterface;
use App\Contracts\Interfaces\FollowerInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsHasLikeInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\NewsPhotoInterface;
use App\Contracts\Interfaces\NewsRejectInterface;
use App\Contracts\Interfaces\NewsSubCategoryInterface;
use App\Contracts\Interfaces\NewsTagInterface;
use App\Contracts\Interfaces\RegisterInterface;
use App\Contracts\Interfaces\ReportInterface;
use App\Contracts\Interfaces\SendMessageInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\TagInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\ViewInterface;
use App\Enums\NewsStatusEnum;
use App\Enums\RoleEnum;
use App\Enums\UserStatusEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\AuthorsRequest;
use App\Http\Resources\AuthorResource;
use App\Mail\SendEmail;
use App\Models\Category;
use App\Models\Comment;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsHasLike;
use App\Models\NewsPhoto;
use App\Models\NewsReject;
use App\Models\NewsReport;
use App\Models\NewsSubCategory;
use App\Models\NewsTag;
use App\Models\Report;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\View;
use App\Services\Auth\RegisterService;
use App\Services\AuthorBannedService;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

use function Laravel\Prompts\alert;

class AuthorController extends Controller
{
    private AuthorInterface $author;
    private RegisterInterface $register;
    private NewsInterface $news;
    private NewsRejectInterface $newsReject;
    private ViewInterface $view;
    private CategoryInterface $categories;
    private SubCategoryInterface $subCategories;
    private TagInterface $tags;
    private NewsTagInterface $newsTags;
    private NewsCategoryInterface $newsCategories;
    private NewsSubCategoryInterface $newsSubCategories;
    private NewsPhotoInterface $newsPhoto;
    private NewsHasLikeInterface $newsLikes;
    private AuthorService $authorService;
    private RegisterService $serviceregister;
    private ReportInterface $report;
    private SendMessageInterface $sendMessage;
    private CommentInterface $comment;
    private UserInterface $user;
    private FollowerInterface $follower;
    private $authorBannedService;


    public function __construct(FollowerInterface $follower,UserInterface $user,CommentInterface $comment,SendMessageInterface $sendMessage,NewsHasLikeInterface $newsLikes, ViewInterface $view, NewsRejectInterface $newsReject, NewsTagInterface $newsTags, NewsPhotoInterface $newsPhoto, CategoryInterface $categories, SubCategoryInterface $subCategories, NewsCategoryInterface $newsCategories, NewsSubCategoryInterface $newsSubCategories, TagInterface $tags, NewsInterface $news,AuthorInterface $author, AuthorService $authorService, RegisterService $serviceregister, RegisterInterface $register, AuthorBannedService $authorBannedService, ReportInterface $report)
    {
        $this->author = $author;
        $this->register = $register;
        $this->newsLikes = $newsLikes;
        $this->news = $news;
        $this->categories = $categories;
        $this->subCategories = $subCategories;
        $this->tags = $tags;
        $this->newsTags = $newsTags;
        $this->newsCategories = $newsCategories;
        $this->newsSubCategories = $newsSubCategories;
        $this->newsPhoto = $newsPhoto;
        $this->newsReject = $newsReject;
        $this->authorService = $authorService;
        $this->authorBannedService = $authorBannedService;
        $this->serviceregister = $serviceregister;
        $this->view = $view;
        $this->report = $report;
        $this->sendMessage = $sendMessage;
        $this->comment = $comment;
        $this->user =  $user;
        $this->follower = $follower;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        $this->newsCategories->deleteByAuthor($author);
        $this->newsSubCategories->deleteByAuthor($author);
        $this->newsTags->deleteByAuthor($author);
        $this->newsLikes->deleteByAuthor($author);
        $this->newsReject->deleteByAuthor($author);
        $this->comment->deleteByAuthor($author);
        $this->report->deleteByAuthor($author);
        $this->view->deleteByAuthor($author);
        $this->sendMessage->deleteByAuthor($author);
        $this->news->deleteByAuthor($author);
        $this->follower->deleteByAuthor($author);

        // $user = $this->user->show($author->user_id);
        // $this->authorBannedService->delete($user);
        // $this->user->delete($user);

        $this->author->delete($author);

        // $this->author->delete($author->id);
        return ResponseHelper::success(null);
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

    public function reject($authorId)
    {
        $email = $this->author->whereEmail($authorId);
        $subject = 'Pemberitahuan: Anda telah ditolak sebagai author';
        $message = 'Anda telah ditolak untuk menjadi author, silahkan untuk menghubungi kami atau mengirim ulang vc anda';
        Mail::raw($message, function ($message) use ($email, $subject) {
            $message->to($email)
            ->subject($subject);
        });

        $data['user_id'] = auth()->user()->id;
        $data['email'] = $email;
        $data['message'] = $message;

        $this->sendMessage->store($data);
        $this->author->delete($authorId);
        return ResponseHelper::success(null);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(AuthorRequest $request, User $user)
    {
        $data = $this->authorService->store($request, $user);
        $this->author->updateOrCreate($user->id,$data);
        return back()->with('success', 'Berhasil mendaftar menjadi penulis.');
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

    public function detailnewsauthor ($newsId)
    {
        $news = $this->news->show($newsId);

        $subCategories = $this->subCategories->get();
        $categories = $this->categories->get();
        $newsPhoto = $this->newsPhoto->get()->whereIn('news_id', $news);

        $tags = $this->tags->get();
        $newsCategories = $this->newsCategories->get()->whereIn('news_id', $news);
        $newsSubCategories = $this->newsSubCategories->get()->whereIn('news_id', $news);
        $newsTags = $this->newsTags->getNewsTags($news);

        return view('pages.author.news.detail', compact('news','tags','newsCategories','newsSubCategories','subCategories','newsTags','categories','newsPhoto'));
    }

    public function inboxauthor()
    {
        $newsRejects = $this->newsReject->where(auth()->user()->id, '0');
        $newsRejectRead = $this->newsReject->where(auth()->user()->id, '0');

        $newsDelete = $this->newsReject->where(auth()->user()->id, '1');
        $newsDeleteRead = $this->newsReject->where(auth()->user()->id, '1');

        $reports = $this->report->whereAuthor('0');
        $reports2 = $this->report->whereAuthor('0');

        $reportsDelete = $this->report->whereAuthor('1');
        $reportsDelete2 = $this->report->whereAuthor('1');

        $sendMessage = $this->sendMessage->get('0');
        $sendMessage2 = $this->sendMessage->get('0');

        $sendDelete = $this->sendMessage->get('1');
        $sendDelete2 = $this->sendMessage->get('1');

        $countReport = $this->report->count('unread');
        $countReport2 = $this->report->count('');
        return view('pages.author.inbox.index', compact('reportsDelete', 'reportsDelete2','newsDelete','newsDeleteRead','newsRejects', 'newsRejectRead', 'countReport', 'reports', 'reports2', 'sendMessage', 'sendMessage2', 'sendDelete', 'sendDelete2'));
    }

    public function inboxcount()
    {
        $countMassage = $this->sendMessage->count('unread');
        return response()->json(['count' => $countMassage]);
    }

    public function inboxcountreport()
    {
        $countReport = $this->report->count('unread');
        return response()->json(['countReport' => $countReport]);
    }

    public function inboxcounttotal()
    {
        $countReport = $this->report->count('unread');
        $countMassage = $this->sendMessage->count('unread');
        $countTotal = $countReport + $countMassage;
        return response()->json(['countTotal' => $countTotal]);
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

    public function incomestatistics()
    {
        return view('pages.author.statistic.income');
    }

    public function newsstatistics()
    {
        $news = $this->news->showWhithCountStat();
        $user_id = $news->pluck('user_id');
        $author_id = auth()->user()->author->id;
        $count = $this->news->getAll()->where('user_id', auth()->user()->id)->count();
        $newsStatistics = $this->view->newsStatistic();
        // dd($newsStatistics);

        $view = $this->view->where();
        $like = $this->newsLikes->whereIn();
        return view('pages.author.statistic.news', compact('news', 'view', 'like', 'count', 'newsStatistics'));
    }
}
