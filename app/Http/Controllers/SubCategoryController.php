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


    public function index(Request $request): View
    {
        if ($request) {
                $query = $request->input('query');
                $categoris = $query ? $this->subCategory->search($query) : $this->subCategory->get();
            return view('pages.categories.subcategories.index', compact('categoris'));
        }
    }


    public function store(Category $category , SubCategoryRequest $request)
    {
        //
        // $request->merge(['category_id' => $category->id]); // Menggabungkan category_id ke dalam data request

        // $subCategories = $this->subCategory->store($request->validated()); // Menyimpan data subkategori dengan category_id yang ditambahkan

        $data = $request->validated();
        $data['category_id'] = $category->id;
        $this->subCategory->store($data);

        return back();
}

    
    public function update(SubCategoryRequest $request, SubCategory $subcategory)
    {
        //
        $this->subCategory->update($subcategory->id, $request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        //
        if (!$this->subCategory->delete($subcategory->id)) {
            return back();
        }

        return redirect()->back();
    }
}