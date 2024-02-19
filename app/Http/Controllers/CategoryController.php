<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CategoryInterface;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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
    public function index(): View
    {
        $categoris = $this->categori->get();
        return view('categories.index', compact('categoris'));
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
    public function store(CategoryRequest $request) : RedirectResponse
    {

        $categori = $this->categori->store($request->validated());
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
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
    public function update(CategoryRequest $request, Category $categori) : RedirectResponse
    {
        $this->categori->update($categori->id, $request->validated());
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $categori) :  RedirectResponse
    {
        if (!$this->categori->delete($categori->id)) {
            return back();
        }

        return redirect()->back();

    }
}
