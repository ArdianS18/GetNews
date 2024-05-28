<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\NewsRejectInterface;
use App\Models\NewsReject;
use GuzzleHttp\Psr7\Request;

class NewsRejectController extends Controller
{
    private NewsRejectInterface $newsReject;


    public function __construct(NewsRejectInterface $newsReject)
    {
        $this->newsReject = $newsReject;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(NewsReject $newsReject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(NewsReject $newsReject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, NewsReject $newsReject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(NewsReject $reject)
    {
        $data = [
            'status_delete' => 1
        ];

        $this->newsReject->update($reject->id, $data);
        return back()->with('success', 'berhasil menghapus data');
    }


    public function recovery(NewsReject $reject)
    {
        $data = [
            'status_delete' => 0
        ];

        $this->newsReject->update($reject->id, $data);
        return back()->with('success', 'berhasil menghapus data');
    }

    public function delete(NewsReject $reject)
    {
        $this->newsReject->delete($reject->id);
        return back()->with('success', 'berhasil menghapus data');
    }

}
