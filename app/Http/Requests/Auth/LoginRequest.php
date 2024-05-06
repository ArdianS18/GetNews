<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'password' => 'required',
            // 'email_verified_at' => 'required|email',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email idak boleh kosong',
            'email.email' => 'Email harus valid',
            'password' => 'Password tidak boleh kosong',
            // 'email_verified_at' => 'Email anda belum terferikasi'
        ];

    }

}
