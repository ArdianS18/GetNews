<?php

namespace App\Services\Auth;

use Carbon\Carbon;
use App\Enums\RoleEnum;
use Illuminate\Support\Str;
use App\Enums\UploadDiskEnum;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Validation\ValidationException;
use App\Contracts\Interfaces\RegisterInterface;
use App\Models\User;
use App\Notifications\VerifyEmailNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;
use App\Mail\HelloMail;

class RegisterService
{
    public function __construct()
    {

    }

    /**
     * Handle a login request to the application.
     *
     * @param LoginRequest $request
     * @return void
     *
     * @throws ValidationException
     */

    public function handleRegister(RegisterRequest $request,RegisterInterface $register): void
    {
        $data = $request->validated();
        $password = bcrypt($data['password']);
        $data['password'] = $password;
        $slug = Str::slug($data['name']);
        $data['slug'] = $slug;
        $user = $register->store($data);
        $user->assignRole(RoleEnum::USER);

        Mail::to($user->email)->send(new Hellomail (['email' => $user->email, 'user' => $user->name,'id' => $user->id]));


        return;
    }

    protected function sendVerificationEmail(User $user)
    {
        Notification::send($user, new VerifyEmailNotification($user));
    }

    public function registerWithAdmin(RegisterRequest $request): array
    {
        $data = $request->validated();

        if ($request->hasFile('cv')) {
            $img = $request->file('cv');
            $stored_image = $img->store(UploadDiskEnum::AUTHOR_CV->value , 'public');
        }

        return [
            'name' => $data['name'],
            'slug' => Str::slug($data['name']),
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'phone_number' => $data['phone_number'],
            'address' => $data['address'],
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'cv' => $stored_image,
        ];
    }
}
