<?php

namespace App\Services\Auth;

use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;
use SebastianBergmann\Type\VoidType;

class LoginService
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


    public function handleLogin(LoginRequest $request)
    {
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            if (auth()->user()->email_verified_at) {
                if (auth()->user()->roles->pluck('name')[0] == 'user') {
                    return redirect('/');
                } else if (auth()->user()->roles->pluck('name')[0] == 'author') {
                    return redirect('/');
                } else if (auth()->user()->roles->pluck('name')[0] == 'admin') {
                    return redirect('dashboard');
                } else if (auth()->user()->roles->pluck('name')[0] == 'super admin') {
                    return redirect('dashboard');
                }else{
                    return redirect()->back();
                }
            }
        }else{
            return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
        }
    }
}
