<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CommentInterface;
use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use App\Models\News;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    private CommentInterface $comment;
    private CommentService $commentService;


    public function __construct(CommentInterface $comment, CommentService $commentService)
    {
        $this->comment = $comment;
        $this->commentService = $commentService;
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
    public function store(CommentRequest $request, News $news)
    {
        $data = $this->commentService->store($request);
        $data['news_id'] = $news->id;
        $this->comment->store($data);
        return back();
    }

    public function reply(CommentRequest $request, News $news ,$commentId)
    {
        $data = $this->commentService->store($request);
        $data['news_id'] = $news->id;
        $data['parent_id'] = $commentId;
        $this->comment->store($data);
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
