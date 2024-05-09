<?php

namespace App\Http\Controllers\Auth;

use App\Contracts\Interfaces\RegisterInterface;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Mail\VerificationEmail;
use App\Services\Auth\RegisterService;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Mail;

use function Laravel\Prompts\alert;

class RegisterController extends Controller
{

    private RegisterInterface $register;
    private RegisterService $service;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(RegisterInterface $register,RegisterService $service)
    {
        $this->register = $register;
        $this->service = $service;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function register(RegisterRequest $request)
    {
        $this->service->handleRegister($request,$this->register);
        return redirect('/login')->with('success',alert('email.verify'));
    }
}
