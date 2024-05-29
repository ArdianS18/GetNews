<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CommentInterface;
use App\Contracts\Interfaces\CommentReportInterface;
use App\Helpers\ResponseHelper;
use App\Models\Comment;
use App\Models\CommentReport;
use App\Services\CommentService;
use Illuminate\Http\Request;

class CommentReportController extends Controller
{
    private CommentReportInterface $commentReport;

    public function __construct(CommentReportInterface $commentReport)
    {
        $this->commentReport = $commentReport;
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
    public function store(Comment $comment, Request $request)
    {
        $data = $this->commentReport->store([
            'user_id' => auth()->user()->id,
            'comment_id' => $comment->id,
            'content' => $request->input('content'),
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CommentReport $commentReport)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CommentReport $commentReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, CommentReport $commentReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CommentReport $commentReport)
    {
        //
    }
}
