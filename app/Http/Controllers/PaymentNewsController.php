<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\PaymentNewsInterface;
use App\Models\PaymentNews;
use Illuminate\Http\Request;

class PaymentNewsController extends Controller
{
    private PaymentNewsInterface $paymentNews;

    public function __construct(PaymentNewsInterface $paymentNews)
    {
        $this->paymentNews = $paymentNews;

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
        dd($request);
        $data['payment_method'] = $request->input('payment_method');
        $data['voucher'] = $request->input('voucher');
        $this->paymentNews->store($data);

        return to_route('pengajuan.berita');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentNews $paymentNews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentNews $paymentNews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentNews $paymentNews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentNews $paymentNews)
    {
        //
    }
}
