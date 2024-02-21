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


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Category $category , SubCategoryRequest $request)
    {
        // $request->merge(['category_id' => $category->id]); // Menggabungkan category_id ke dalam data request

        // $subCategories = $this->subCategory->store($request->validated()); // Menyimpan data subkategori dengan category_id yang ditambahkan

        $data = $request->validated();
        $data['category_id'] = $category->id;
        $this->subCategory->store($data);

        return back();
}

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategoryRequest $request, SubCategory $subcategory)
    {
        $this->subCategory->update($subcategory->id, $request->validated());
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subcategory)
    {
        if (!$this->subCategory->delete($subcategory->id)) {
            return back();
        }

        return redirect()->back();
    }
}
