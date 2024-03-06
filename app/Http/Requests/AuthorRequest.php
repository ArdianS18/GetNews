<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthorRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required',
            'photo' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'photo.required' => 'Mohon untuk inputkan foto CV anda',
        ];
    }
}
