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
        $request->merge([
            'question' => $faq->id,
        ]);

        $query = $request->input('search');
        $searchTerm = $request->input('search', '');
        $faqs = $query ? $this->faq->search($query) : $this->faq->paginate();
        $faqs->appends(['search' => $searchTerm]);
        $data = FaqResource::collection($faqs);
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
        return back()->with('success', 'berhasil mengupdate data!!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $this->faq->delete($faq->id);
        return back()->with('success', 'berhasil menghapus data');
    }
}
