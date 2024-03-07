<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ViewInterface;
use App\Http\Requests\ViewRequest;
use App\Models\View;
use App\Services\ViewService;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    private ViewInterface $view;
    private ViewService $service;

    public function __construct(ViewInterface $view, ViewService $service)
    {
        $this->view = $view;
        $this->service = $service;
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
    public function store(ViewRequest $request, View $view)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(View $view)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(View $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, View $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(View $view)
    {
        //
    }
}
