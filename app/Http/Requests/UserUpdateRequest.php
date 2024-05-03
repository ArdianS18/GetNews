<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo' => 'nullable|image|mimes:jpg,png,jpeg',
            'name' => 'required',
            'email' => 'required',
            'role' => 'required',
            'phone_number' => 'nullable',
            'address' => 'nullable',
            'birth_date' => 'nullable',
            'email_verified_at' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            'photo.nullable' => 'Ubah foto kamu',
        ];
    }
}
