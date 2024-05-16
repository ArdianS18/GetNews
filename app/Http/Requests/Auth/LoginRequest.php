<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

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
            'email_verified_at' => 'required|date'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Email idak boleh kosong',
            'email.email' => 'Email harus valid',
            'password' => 'Password tidak boleh kosong',
            'email_verified_at.required' => 'Email anda belum terverifikasi. Mohon untuk mengecek email anda',
            'email_verified_at.date' => 'Format tanggal email_verified_at tidak valid'
        ];

    }

}
