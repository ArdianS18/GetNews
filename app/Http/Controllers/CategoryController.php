<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Contracts\Interfaces\CategoryInterface;

class CategoryController extends Controller
{
    private CategoryInterface $categori;


    public function __construct(CategoryInterface $categori)
    {
        $this->categori = $categori;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if ($request) {
            $query = $request->input('query');
            $categoris = $query ? $this->categori->search($query) : $this->categori->get();
            return view('pages.categories.index', compact('categoris'));
        }

        $categoris = $this->categori->get();
        return view('pages.categories.index', compact('categoris'));
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
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category, Request $request)
    {
        $subCategory = $category->subCategories;

        if ($request) {
            $query = $request->input('name');
            $subCategory = $query ? $this->categori->search($query) : $this->categori->get();
            return view('categories.subcategories.index', compact('subCategory', 'category'));
        }

        return view('categories.subcategories.index', compact('category', 'subCategory'));
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
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category): RedirectResponse
    {
        if (!$this->categori->delete($category->id)) {
            return back();
        }

        return redirect()->back();
    }
}
