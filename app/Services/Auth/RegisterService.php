<?php

namespace App\Services\Auth;

use App\Enums\RoleEnum;
use SebastianBergmann\Type\VoidType;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use Illuminate\Validation\ValidationException;
use App\Contracts\Interfaces\RegisterInterface;

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
        $user = $register->store($data);
        $user->assignRole(RoleEnum::USER);
        return;
    }
}
