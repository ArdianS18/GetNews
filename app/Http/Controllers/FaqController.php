<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\FaqInterface;
use App\Http\Requests\FaqRequest;
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
    public function index()
    {
        $faqs = $this->faq->get();
        return view('pages.crud.faq', compact('faqs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $this->faq->store(($request->validated()));
        return back()->with('success', 'berhasil menambah data');
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
