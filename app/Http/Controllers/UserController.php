<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\UserInterface;
use App\Enums\UserStatusEnum;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class UserController extends Controller
{

    private UserInterface $user;

    public function __construct(UserInterface $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request, User $user): View
    {
        $request->merge([
            'sub_category_id' => $user->id
        ]);

        $search = $request->input('search');
        $status = $request->input('status');

        $users = $this->user->search($request);
        return view('pages.admin.user.index', compact('users', 'search', 'status'));
    }

    public function approved(User $user)
    {
        $data['status'] = UserStatusEnum::APPROVED->value;
        $this->user->update($user->id, $data);
        return back();
    }

    public function reject(User $user)
    {
        $data['status'] = UserStatusEnum::REJECT->value;
        $this->user->update($user->id, $data);
        return back();
        $users = $this->user->get();
        return view('pages.useraprove.index', compact('users'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
