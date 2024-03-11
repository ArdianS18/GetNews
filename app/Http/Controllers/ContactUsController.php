<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ContactUsInterface;
use App\Contracts\Interfaces\FaqInterface;
use App\Http\Requests\ContactUsRequest;
use App\Models\ContactUs;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private ContactUsInterface $contactUs;
    private FaqInterface $faq;
    private User $user;

    public function __construct(ContactUsInterface $contactUs, FaqInterface $faq, User $user)
    {
        $this->contactUs = $contactUs;
        $this->user = $user;
        $this->faq = $faq;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contactUs = $this->contactUs->get();
        return view('pages.admin.inbox.index', compact('contactUs'));
    }

    public function contact(Faq $faq){
        $contactUs = $this->contactUs->get();
        $faqs = $this->faq->get();
        return view('pages.user.contact-us.index', compact('contactUs','faqs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ContactUsRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $this->contactUs->store($data);
        return back()->with('success', 'berhasil menambahkan data');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactUs $contact,ContactUsRequest $request)
    {
        // dd($contact->message);
        $this->contactUs->update($contact->id, $request->validated());
        return back()->with('success', 'berhasil mengupdate data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactUs $contact)
    {
        $this->contactUs->delete($contact->id);

        return back()->with('success', 'berhasil menghapus data');
    }
}
