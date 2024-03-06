<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Services\AuthorService;
use App\Http\Requests\AuthorRequest;
use App\Contracts\Interfaces\AuthorInterface;
use App\Contracts\Interfaces\RegisterInterface;
use App\Enums\UserStatusEnum;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\Auth\RegisterService;

class AuthorController extends Controller
{
    private AuthorInterface $author;
    private RegisterInterface $register;

    private AuthorService $service;
    private RegisterService $serviceregister;


    public function __construct(AuthorInterface $author, AuthorService $service, RegisterService $serviceregister, RegisterInterface $register)
    {
        $this->author = $author;
        $this->register = $register;

        $this->service = $service;
        $this->serviceregister = $serviceregister;

    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, Author $author)
    {
        $request->merge([
            'user_id' => $author->id
        ]);

        $search = $request->input('search');
        $status = $request->input('status');

        $authors = $this->author->search($request);
        return view('pages.admin.user.index', compact('authors', 'search', 'status'));
    }

    public function approved(Author $author)
    {
        $data['status'] = UserStatusEnum::APPROVED->value;
        $this->author->update($author->id, $data);
        return back();
    }

    public function reject(Author $author)
    {
        $data['status'] = UserStatusEnum::REJECT->value;
        $this->author->update($author->id, $data);
        return back();
        $authors = $this->author->get();
        return view('pages.useraprove.index', compact('authors'));
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
    public function store(RegisterRequest $request)
    {
        $data = $this->serviceregister->registerWithAdmin($request);
        $userId = $this->register->store($data)->id;

        $img = $data['photo'];
        $this->author->store([
            'user_id' => $userId,
            'photo' => $img,
        ]);

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AuthorRequest $request, Author $author)
    {
        $data = $this->service->update($request, $author);
        $this->author->update($author->id, $data);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author)
    {
        //
    }
}
