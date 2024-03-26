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
                $role = auth()->user()->roles->pluck('name')[0];
                switch ($role) {
                    case "user":
                        return redirect('/');
                        break;
                    case "author":
                        return redirect('/');
                        break;
                    case 'admin':
                        return redirect('dashboard');
                        break;
                    case 'super admin':
                        return redirect('dashboard');
                        break;
                    default:
                        return redirect()->back()->withErrors("Ada Yang Salah");
                        break;
                }
            }else{
                return redirect('login')->withErrors("Email anda belum di verifikasi silahkan cek inbox anda!!");
            }
        } else {
            return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
        }
    }
}
