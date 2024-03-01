<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\NewsPhotoInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\NewsRequest;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Category;
use App\Models\News;
use App\Models\SubCategory;
use App\Services\NewsService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    private NewsInterface $news;
    private SubCategoryInterface $subCategory;
    private NewsService $NewsService;
    private CategoryInterface $category;
    private NewsPhotoInterface $newsPhoto;

    public function __construct(NewsInterface $news,SubCategoryInterface $subCategory, NewsService $NewsService, CategoryInterface $category, NewsPhotoInterface $newsPhoto)
    {
        $this->news = $news;
        $this->newsPhoto = $newsPhoto;
        $this->subCategory = $subCategory;
        $this->category = $category;
        $this->NewsService = $NewsService;

    }

    public function index()
    {
        $subCategories = $this->subCategory->get();
        $news = $this->news->get();
        return view('pages.author.index', compact('news', 'subCategories'));
    }


    public function store(NewsRequest $request)
    {
        // $data['user_id'] = auth()->id();
        // dd($request);

        $data = $this->NewsService->store($request);
        $newsId = $this->news->store($data)->id;

        foreach ($data['multi_photo'] as $img) {
            $this->newsPhoto->store([
                'news_id' => $newsId,
                'multi_photo' => $img,
            ]);
        }

        // $this->news->store($store);
        return ResponseHelper::success(null, trans('alert.add_success'));
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

    public function editnews()
    {
        //
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
}
