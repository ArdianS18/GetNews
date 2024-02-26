<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => 'required|in:panding,approved,notapproved',
        ];
    }

    public function messages(): array
    {
        return [
            'status|required' => 'Mohon ubah statusnya',
        ];
    }
}
