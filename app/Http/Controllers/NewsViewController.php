<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsViewController extends Controller
{
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
    public function store(Request $request)
    {
        //
    }

    /**
<<<<<<< HEAD
=======
     * Display the specified resource.
     */
    public function showPopularView(News $news)
    {
        // $popularNews = News::orderBy('views', 'desc')->take(5)->get();
        // compact('popularNews')
        return view('pages.index');
    }

    /**
>>>>>>> 3b092b27cbe29313b0fcebf4319e8a2b1aada666
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}