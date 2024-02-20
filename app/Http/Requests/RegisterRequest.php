<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

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
            'password' => 'required|max:100'
        ];
    }


    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'email.required' => 'Hobi tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong',
        ];
    }
}
