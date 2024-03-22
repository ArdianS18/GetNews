<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AuthorInterface;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\NewsPhotoInterface;
use App\Contracts\Interfaces\NewsSubCategoryInterface;
use App\Contracts\Interfaces\NewsTagInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\TagInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\NewsUpdateRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\NewsPhoto;
use App\Models\SubCategory;
use App\Models\User;
use App\Services\NewsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;
use Illuminate\Support\Str;

class ProfileController extends Controller
{
    private UserInterface $user;
    private NewsInterface $news;
    private AuthorInterface $author;
    private SubCategoryInterface $subCategory;
    private NewsService $NewsService;
    private CategoryInterface $category;
    private TagInterface $tag;

    private NewsPhotoInterface $newsPhoto;
    private NewsCategoryInterface $newsCategory;
    private NewsSubCategoryInterface $newsSubCategory;
    private NewsTagInterface $newsTag;

    public function __construct(TagInterface $tag, NewsTagInterface $newsTag, NewsSubCategoryInterface $newsSubCategory, NewsCategoryInterface $newsCategory, UserInterface $user, AuthorInterface $author, NewsInterface $news,SubCategoryInterface $subCategory, NewsService $NewsService, CategoryInterface $category, NewsPhotoInterface $newsPhoto)
    {
        $this->newsCategory = $newsCategory;
        $this->newsTag = $newsTag;
        $this->newsSubCategory = $newsSubCategory;

        $this->tag = $tag;
        $this->user = $user;
        $this->news = $news;
        $this->author = $author;
        $this->newsPhoto = $newsPhoto;
        $this->subCategory = $subCategory;
        $this->category = $category;
        $this->NewsService = $NewsService;

    }

    public function index()
    {
        $subCategories = $this->subCategory->get();
        $category = $this->category->get();
        $news = $this->news->get();
        $news_status = $this->news->get();
        $authors = $this->author->get();

        // return view('pages.author.index', compact('news', 'news_status'));
        return view('pages.author.index', compact('news','news_status', 'subCategories', 'category', 'authors'));
    }

    public function profilestatus()
    {
        $subCategories = $this->subCategory->get();
        $news = $this->news->get();
        return view('pages.author.status.index', compact('news', 'subCategories'));
    }

    public function createberita()
    {
        $subCategories = $this->subCategory->get();
        $news = $this->news->get();
        $categories = $this->category->get();
        return view('pages.author.news.create', compact('news', 'subCategories', 'categories'));
    }

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

        foreach ($data['multi_photo'] as $img) {
            $this->newsPhoto->store([
                'news_id' => $newsId,
                'multi_photo' => $img,
            ]);
        }

        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    public function updateberita(NewsUpdateRequest $request, News $news, NewsPhoto $newsPhoto)
    {
        $data = $this->NewsService->update($request, $news, $newsPhoto);
        $this->news->update($news->id, $data);

        if ($request->hasFile('multi_photo')) {

            $newsPhoto->where('news_id', $news->id)->delete();

            foreach ($data['multi_photo'] as $photo) {
                $newsPhoto->create([
                    'news_id' => $news->id,
                    'multi_photo' => $photo,
                ]);
            }
        }

        return ResponseHelper::success(null, trans('alert.add_success'));
        // return to_route('profile-status.author')->with('success', trans('alert.add_success'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function editnews($newsId)
    {
        $news = $this->news->where($newsId);

        $subCategories = $this->subCategory->get();
        $categories = $this->category->get();
        $newsPhoto = $this->newsPhoto->get()->whereIn('news_id', $news);

        return view('pages.author.news.update', compact('news','subCategories','categories','newsPhoto'));
    }

    public function profileupdate(){
        return view('pages.author.profile.update');
    }

    public function updateprofile(User $user, RegisterRequest $registerRequest){
        $this->user->update($user->id, $registerRequest->validated());
        return back();
    }

    public function changepassword(User $user, RegisterRequest $registerRequest){
        if (!Hash::check($registerRequest->old_password, auth()->user()->password)) {
            throw ValidationException::withMessages(['old_password' => 'Password lama tidak sesuai.']);
            return redirect()->back()->with('failed', trans('alert.password_failed'));
        }

        $this->user->update($user->id, $registerRequest->validated());
        return redirect()->back()->with('success', trans('alert.password_updated'));
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    // public function profileupdate(){

    // }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    public function deletenews()
    {

    }
}
