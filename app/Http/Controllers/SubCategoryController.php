<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Helpers\ResponseHelper;
use Illuminate\Contracts\View\View;
use App\Services\SubCategoryService;
use App\Http\Requests\SubCategoryRequest;
use App\Http\Resources\SubCategoryResource;
use App\Contracts\Interfaces\SubCategoryInterface;

class SubCategoryController extends Controller
{

    private SubCategoryInterface $subCategory;
    private SubCategoryService $subCategoryService;

    public function __construct(SubCategoryInterface $subCategory, SubCategoryService $subCategoryService)
    {
        $this->subCategory = $subCategory;
        $this->subCategoryService = $subCategoryService;
    }


    public function index(Request $request,Category $category)
    {
        $request->merge(['category' => $category->id]);
        $faq = $this->subCategory->customPaginate($request, 10);
        $data['paginate'] = [
            'current_page' => $faq->currentPage(),
            'last_page' => $faq->lastPage(),
        ];
        $data['data'] = SubCategoryResource::collection($faq);
        return ResponseHelper::success($data);

    }


    public function store(SubCategoryRequest $request , Category $category)
    {
        // dd($request);
        $data = $this->subCategoryService->store($request);
        $data['category_id'] = $category->id;
        $this->subCategory->store($data);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    public function update(SubCategoryRequest $request, SubCategory $subcategory, Category $category)
    {
        $data = $this->subCategoryService->update($request, $subcategory);
        $this->subCategory->update($subcategory->id, $data);
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {

        if (!$this->subCategory->delete($subcategory->id)) {
            return back()->with('success', trans('alert.delete_success'));
        }

        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
