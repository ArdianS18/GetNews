<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
      /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'nullable',
            'slug' => 'nullable',
            'email' => 'nullable',
            'phone_number' => 'nullable',
            'address' => 'nullable',
            'birth_date' => 'nullable',
        ];
    }

    public function messages(): array
    {
        return [
            //
        ];
    }
}
