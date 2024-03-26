<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FaqInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\FaqRequest;
use App\Http\Resources\FaqResource;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    private FaqInterface $faq;

    public function __construct(FaqInterface $faq)
    {
        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Faq $faq)
    {
        if ($request->has('page')) {
            $faq = $this->faq->customPaginate($request, 10);
            $data['paginate'] = [
                'current_page' => $faq->currentPage(),
                'last_page' => $faq->lastPage(),
            ];
            $data['data'] = FaqResource::collection($faq);
        } else {
            $faqs = $this->faq->search($request);
            $data = FaqResource::collection($faqs);
        }
        return ResponseHelper::success($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $this->faq->store(($request->validated()));
        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, Faq $faq)
    {
        $this->faq->update($faq->id, $request->validated());
        return ResponseHelper::success(null, trans('alert.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $this->faq->delete($faq->id);
        return ResponseHelper::success(null, trans('alert.delete_success'));
    }
}
