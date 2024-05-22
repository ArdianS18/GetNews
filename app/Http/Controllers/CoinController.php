<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\CoinInterface;
use App\Helpers\ResponseHelper;
use App\Models\Coin;
use Illuminate\Http\Request;

class CoinController extends Controller
{
    private CoinInterface $coin;

    public function __construct(CoinInterface $coin)
    {
        $this->coin = $coin;
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
        $data['user_id'] = auth()->user()->id;
        $this->coin->store($data);

        // return back();
        return ResponseHelper::success();
    }

    /**
     * Display the specified resource.
     */
    public function show(Coin $coin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coin $coin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coin $coin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coin $coin)
    {
        //
    }
}
