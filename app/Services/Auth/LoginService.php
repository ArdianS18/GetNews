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
        $user = auth()->user();
        if ($user->roles->pluck('name')[0] == 'author' && $user->author->status == 'reject') {
            auth()->logout();
            return redirect()->back()->withErrors(trans('auth.author_banned'))->withInput();
        }

        if (!$user->email_verified_at) {
            auth()->logout();
            return view('auth.verify');

        }

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
        } else {
            return redirect()->back()->withErrors(trans('auth.login_failed'))->withInput();
        }
    }
}
