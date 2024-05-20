<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\ContactInterface;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    private ContactInterface $contact;
    private ContactService $service;

    public function __construct(ContactInterface $contact, ContactService $service)
    {
        $this->contact = $contact;
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
    public function store(ContactRequest $request)
    {
        $data = $this->service->store($request);
        $this->contact->store($data);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ContactRequest $request, Contact $contact)
    {
        $data = $this->service->update($request, $contact);
        $this->contact->update($contact->id,$data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        //
    }
}
