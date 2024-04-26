<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AdvertisementInterface;
use App\Contracts\Interfaces\PaymentAdvertisementInterface;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\PaymentAdvertisementsRequest;
use App\Models\Advertisement;
use App\Models\PaymentAdvertisements;
use Illuminate\Http\Request;

class PaymentAdvertisementsController extends Controller
{
    private PaymentAdvertisementInterface $paymentAdvertisements;
    private AdvertisementInterface $advertisement;

    public function __construct(PaymentAdvertisementInterface $paymentAdvertisements, AdvertisementInterface $advertisement)
    {
        $this->paymentAdvertisements = $paymentAdvertisements;
        $this->advertisement = $advertisement;

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
    public function store(PaymentAdvertisementsRequest $request)
    {
        // dd($request);
        $data = $request->validated();
        // $advertisement = $this->news->store($data)->id;
        // $advertisement = Advertisement::first();

        // Buat data untuk disimpan
        // $data = [
        //     'advertisement_id' => $advertisement->id,
        //     'payment_method' => $request->payment_method,
        //     'voucher' => $request->voucher,
        // ];

        

        $this->paymentAdvertisements->store($data);
        return back()->with('success', 'berhasil menambahkan data');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaymentAdvertisements $paymentAdvertisements)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaymentAdvertisements $paymentAdvertisements)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaymentAdvertisements $paymentAdvertisements)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaymentAdvertisements $paymentAdvertisements)
    {
        //
    }
}
