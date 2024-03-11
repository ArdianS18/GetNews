<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RegisterRequest extends BaseRequest
{


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required', 'string', 'max:255',
            'email' => 'required', 'string', 'email', 'max:255', 'unique:users',
            'password' => 'required', 'string', 'min:8', 'confirmed',
            'phone_number' => 'required', 'numeric', 'min:15',
            'address' => 'required', 'string', 'max:255',
            'photo' => 'required',
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Nama mohon untuk diisi',
            'email.required' => 'Email mohon untuk diisi',
            'email.email' => 'Mohon email berupa Gmail',
            'password.required' => 'Password mohon untuk diisi',
            'password.min' => 'Password minimal 8 karakter',
            'phone_number.required' => 'Nomor mohon untuk diisi',
            'phone_number.numeric' => 'Nomor mohon berupa angka',
            'phone_number.min' => 'Nomor minimal 15 karakter',
            'address.required' => 'Alamat mohon untuk diisi'
        ];
    }
}
