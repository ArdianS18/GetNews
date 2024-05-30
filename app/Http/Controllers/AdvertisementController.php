<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\AdvertisementInterface;
use App\Contracts\Interfaces\AdvertisementPhotoInterface;
use App\Enums\AdvertisementStatusEnum;
use App\Enums\NewsStatusEnum;
use App\Helpers\ResponseHelper;
use App\Http\Requests\AdvertisementRequest;
use App\Http\Requests\AdvetisementRequest;
use App\Http\Resources\AdvertisementResource;
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

    public function indexAdmin(Request $request, Advertisement $advertisement)
    {
        if ($request->has('page')) {
            $advertisement = $this->advertisement->customPaginate2($request, 10);
            $data['paginate'] = [
                'current_page' => $advertisement->currentPage(),
                'last_page' => $advertisement->lastPage(),
            ];
            $data['data'] = AdvertisementResource::collection($advertisement);
        } else {
            $advertisement = $this->advertisement->search($request);
            $data = AdvertisementResource::collection($advertisement);
        }
        return ResponseHelper::success($data);
    }

    public function indexApproved(Request $request, Advertisement $advertisement)
    {
        if ($request->has('page')) {
            $advertisement = $this->advertisement->customPaginateApproved($request, 10);
            $data['paginate'] = [
                'current_page' => $advertisement->currentPage(),
                'last_page' => $advertisement->lastPage(),
            ];
            $data['data'] = AdvertisementResource::collection($advertisement);
        } else {
            $advertisement = $this->advertisement->search($request);
            $data = AdvertisementResource::collection($advertisement);
        }
        return ResponseHelper::success($data);
    }

    public function advertisementStore()
    {
        $advertisements = $this->advertisement->get();
        return view('pages.user.iklan.status', compact('advertisements'));
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
        $data = $this->advertisementService->store($request);
        $data['status'] = AdvertisementStatusEnum::PENDING->value;
        $this->advertisement->store($data);
        return to_route('iklan.status')->with('success', trans('alert.alert.add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Advertisement $advertisement)
    {
        return view('pages.user.iklan.pembayaran', compact('advertisement'));
    }

    public function approved(Advertisement $advertisement)
    {
        $data['status'] = AdvertisementStatusEnum::ACCEPTED->value;
        $this->advertisement->update($advertisement->id,$data);
        return ResponseHelper::success(null);
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
    public function destroy($id)
    {
        $this->advertisement->delete($id);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Advertisement $advertisement)
    {
        try {
            $this->advertisement->delete($advertisement->id);
            return ResponseHelper::success(null, trans('alert.delete_success'));
        } catch (\Exception $e) {
            return ResponseHelper::error(trans('alert.delete_error'), 500);
        }
    }
}
