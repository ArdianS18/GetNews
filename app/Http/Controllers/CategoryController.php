<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;
use Illuminate\Database\Eloquent\Casts\Json;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\NewsInterface;
use App\Contracts\Interfaces\SubCategoryInterface;

class CategoryController extends Controller
{
    private CategoryInterface $categori;
    private SubCategoryInterface $subCategory;
    private NewsInterface $news;

    public function __construct(CategoryInterface $categori, SubCategoryInterface $subCategory, NewsInterface $news)
    {
        $this->categori = $categori;
        $this->subCategory = $subCategory;
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if ($request) {
                $query = $request->input('query');
                $categoris = $query ? $this->categori->search($query) : $this->categori->get();

                if ($categoris->isEmpty()) {
                    return view('pages.admin.categories.index', compact('categoris'))->with('message', 'Data tidak ditemukan atau tidak ada');
                }

            return view('pages.admin.categories.index', compact('categoris'));
        }


        $categoris = $this->categori->get();
        return view('pages.admin.categories.index', compact('categoris'));
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
    public function store(CategoryRequest $request): RedirectResponse
    {

        $categori = $this->categori->store($request->validated());
        return redirect()->back()->with('success', trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Request $request)
    {
        $request->merge([
            'category_id' => $category->id
        ]);

        $subCategory = $this->subCategory->search($request);
        return view('pages.admin.categories.subcategories.index', compact('subCategory', 'category'));
    }

        /**
     * Display the specified resource.
     */
    public function getCategory(Category $category, Request $request) :JsonResponse
    {
        $request->merge([
            'category_id' => $category->id
        ]);

        $subCategory = $this->subCategory->search($request);
        return ResponseHelper::success($subCategory,trans('alert.fetch_success'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category): RedirectResponse
    {
        $this->categori->update($category->id, $request->validated());
        return redirect()->back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if (!$this->categori->delete($category->id)) {
            return back()->with('success', trans('alert.delete_success'));
        }

        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
