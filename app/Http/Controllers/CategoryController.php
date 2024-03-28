<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use App\Services\CategoryService;
use Illuminate\Http\JsonResponse;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryResource;
use App\Contracts\Interfaces\NewsInterface;
use Illuminate\Database\Eloquent\Casts\Json;
use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Contracts\Interfaces\NewsCategoryInterface;
use App\Contracts\Interfaces\NewsSubCategoryInterface;

class CategoryController extends Controller
{
    private CategoryInterface $categori;
    private SubCategoryInterface $subCategory;
    private NewsInterface $news;
    private CategoryService $CategoryService;

    private NewsSubCategoryInterface $newsSubCategory;

    public function __construct(NewsSubCategoryInterface $newsSubCategory, CategoryInterface $categori, SubCategoryInterface $subCategory, NewsInterface $news, CategoryService $CategoryService)
    {
        $this->categori = $categori;
        $this->subCategory = $subCategory;
        $this->news = $news;
        $this->newsSubCategory = $newsSubCategory;
        $this->CategoryService = $CategoryService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Category $category)
    {   
        if ($request->has('page')) {
            $category = $this->categori->customPaginate($request, 10);
            $data['paginate'] = [
                'current_page' => $category->currentPage(),
                'last_page' => $category->lastPage(),
            ];
            $data['data'] = CategoryResource::collection($category);
        } else {
            $categories = $this->categori->search($request);
            $data = CategoryResource::collection($categories);
        }
        return ResponseHelper::success($data);
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
    public function store(CategoryRequest $request)
    {
        $data = $this->CategoryService->store($request);
        $this->categori->store($data);
        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Request $request)
    {
        // $subCategory = $this->subCategory->showWithSlug($slug);

        $request->merge([
            'category_id' => $category->id
        ]);

        $data = $request->input('query');
        $subCategory = $this->subCategory->whereIn($data, false, $request);

        // $subCategory = $query ? $this->subCategory->search($query) : $this->subCategory->paginate();
        // $subCategory = $this->subCategory->search($query);
        return view('pages.admin.categories.subcategories.index', compact('subCategory', 'category'));
    }

    public function showCategory(string $slug): View
    {
        $categories = $this->categori->showWithSlug($slug);

        return view('pages.product-detail', [
            'name' => $categories->name,
        ]);
    }

        /**
     * Display the specified resource.
     */
    public function getCategory(Category $category, Request $request)
    {
        // $request->merge([
        //     'category_id' => $category->id
        // ]);

        $subCategory = $this->subCategory->get()->whereIn('category_id', $category->id)->id;
        $news = $this->news->get();
        $newsSubCategories = $this->newsSubCategory->get();
        
        return view('pages.user.news.subcategory', compact('subCategory','news', 'newsSubCategories'));
        // return ResponseHelper::success($subCategory,$news,$newsSubCategory,trans('alert.fetch_success'));
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
    public function update(CategoryRequest $request, Category $category)
    {
        $data = $this->CategoryService->update($request, $category);
        $this->categori->update($category->id, $data);
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $this->categori->delete($category->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));

    }
}
