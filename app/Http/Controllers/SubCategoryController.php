<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SubCategoryInterface;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use App\Services\SubCategoryService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    private SubCategoryInterface $subCategory;
    private SubCategoryService $subCategoryService;

    public function __construct(SubCategoryInterface $subCategory, SubCategoryService $subCategoryService)
    {
        $this->subCategory = $subCategory;
        $this->subCategoryService = $subCategoryService;
    }


    public function index()
    {
        //
    }


    public function store(SubCategoryRequest $request , Category $category)
    {
        $data = $this->subCategoryService->store($request);
        $data['category_id'] = $category->id;
        $this->subCategory->store($data);

        return back()->with('success', trans('alert.add_success'));
    }

    public function update(SubCategoryRequest $request, SubCategory $subcategory, Category $category)
    {
        $data = $this->subCategoryService->update($request, $subcategory);
        $this->subCategory->update($subcategory->id, $data);
        return back()->with('success', trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        //
        if (!$this->subCategory->delete($subcategory->id)) {
            return back()->with('success', trans('alert.delete_success'));
        }

        return redirect()->back()->with('success', trans('alert.delete_success'));
    }
}
