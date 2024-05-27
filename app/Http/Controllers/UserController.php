<?php

namespace App\Http\Controllers;

use App\Contracts\Interfaces\SendMessageInterface;
use App\Models\User;
use Illuminate\Support\Str;
use App\Http\Requests\UserRequest;
use App\Services\UserPhotoService;;
use App\Contracts\Interfaces\UserInterface;
use App\Helpers\ResponseHelper;
use App\Http\Requests\UserPhotoRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{

    private UserInterface $user;
    private UserPhotoService $userPhoto;

    private SendMessageInterface $sendMessage;

    public function __construct(UserInterface $user, UserPhotoService $userPhoto, SendMessageInterface $sendMessage)
    {
        $this->user = $user;
        $this->userPhoto = $userPhoto;
        $this->sendMessage = $sendMessage;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->sendMessage->get();
        $message = $this->sendMessage->get();

        $delete_message = $this->sendMessage->get()->whereIn('status_delete', 1);
        return view('pages.user.inbox.index', compact('data', 'message', 'delete_message'));
    }

    public function accountUserList()
    {
        return view('pages.admin.akun.user');
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
    public function store(UserPhotoRequest $request, User $user)
    {
        $data = $this->userPhoto->store($request, $user);
        $this->user->update($user->id, $data);
        return back()->with('success', 'Berhasil memperbarui foto profile');
    }

    public function storeByAdmin(UserRequest $request)
    {
        $data = $request->validated();
        $data['email_verified_at'] = now();
        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;
        $user = $this->user->store($data);
        $user->assignRole($data['role']);

        return ResponseHelper::success(null, trans('alert.add_success'));
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
        $data = $request->validated();
        $data['email_verified_at'] = now();
        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;
        $this->user->update($user->id, $data);

        return ResponseHelper::success(null, trans('alert.add_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $user = User::findOrFail($id);
            $user->delete();

            $user->roles->destroy();
            $user->permissions->destroy();

            return ResponseHelper::success(null, trans('alert.add_success'));
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $exception) {
        } catch (\Exception $exception) {
        }
    }
}
