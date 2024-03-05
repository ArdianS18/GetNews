<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Contracts\Interfaces\SubCategoryInterface;
use App\Http\Requests\SubCategoryRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{

    private SubCategoryInterface $subCategory;

    public function __construct(SubCategoryInterface $subCategory)
    {
        $this->subCategory = $subCategory;
    }


    public function index()
    {
        //
    }


    public function store(SubCategory $SubCategory , SubCategoryRequest $request , Category $category)
    {
        $data = $request->validated();
        $data['category_id'] = $category->id;
        $this->subCategory->store($data);

        return back()->with('success', trans('alert.add_success'));
    }

    


    public function update(SubCategoryRequest $request, SubCategory $subcategory)
    {
        //
        $this->subCategory->update($subcategory->id, $request->validated());
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
