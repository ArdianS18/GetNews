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
            'cv' => 'required|mimes:pdf',
        ];
    }

    public function messages()
    {
        return [
            'cv.required' => 'Mohon untuk inputkan foto CV anda',
        ];
    }
}
