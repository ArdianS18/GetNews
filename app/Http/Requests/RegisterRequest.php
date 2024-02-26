<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|unique|email',
            'password' => 'required|min.8|max:100',
            'password_confirmation' => 'required_with:password|same:password|min:8',
            'nomor' => 'required|max:15',
            'alamat' => 'required'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
            'password_confirmation.required_with' => 'konfirmasi password tidak sesuai',
            'nomor.required' => 'nomor tidak boleh kosong',
            'alamat.required' => 'alamat tidak boleh kosong'
        ];
    }
}
