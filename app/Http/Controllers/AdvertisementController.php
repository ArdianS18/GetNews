<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AdvertisementInterface;
use App\Contracts\Interfaces\AdvertisementPhotoInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\AdvetisementRequest;
use App\Models\Advertisement;
use App\Services\AdvertisementPhotoService;
use App\Services\AdvertisementService;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    private AdvertisementInterface $advertisement;
    private AdvertisementService $advertisementService;
    private AdvertisementPhotoInterface $advertisementPhoto;

    public function __construct(
    AdvertisementInterface $advertisement,
    AdvertisementService $advertisementService,
    AdvertisementPhotoInterface $advertisementPhoto,
    )
    {
        $this->advertisement = $advertisement;
        $this->advertisementService = $advertisementService;
        $this->advertisementPhoto = $advertisementPhoto;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.user.iklan.pengajuan');
    }

    public function indexAdmin()
    {
        return view('pages.admin.iklan.index');
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
    public function store(AdvertisementRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $advertisement = $this->advertisement->store($data);

        return to_route('payment.advertisement.show', $advertisement->id)->with('success', trans('alert.alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        return view('pages.user.iklan.pembayaran', compact('advertisement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Advertisement $advertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Advertisement $advertisement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Advertisement $advertisement)
    {
        //
    }
}
