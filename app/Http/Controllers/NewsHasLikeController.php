<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsHasLikeInterface;
use App\Http\Requests\NewsLikeRequest;
use App\Models\NewsHasLike;
use Illuminate\Http\Request;

class NewsHasLikeController extends Controller
{

    private NewsHasLikeInterface $newsHasLike;

    public function __construct(NewsHasLikeInterface $newsHasLike)
    {
        $this->newsHasLike = $newsHasLike;
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
    public function store(NewsLikeRequest $request, NewsHasLike $newsHasLike)
    {
        $data = $request->validated();

        $query = $newsHasLike->updateOrCreate(
            [
                'user_id' => auth()->id(),
                'news_id' => $request->input('news_id')
            ],
            [
                'status' => $data['status']
            ]
            );

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsHasLike $newsHasLike)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsHasLike $newsHasLike)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsHasLike $newsHasLike)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsHasLike $newsHasLike, $newsId)
    {
        $this->newsHasLike->delete($newsHasLike)->where('news_id', $newsId);
    }
}
