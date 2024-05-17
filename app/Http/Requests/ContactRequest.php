<?php

namespace App\Http\Requests;

use App\Http\Requests\BaseRequest;
use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'logo' => 'required ',
            'slogan' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required|numeric',
            'address' => 'required',
            'url_facebook' => 'required',
            'url_twitter' => 'required',
            'url_instagram' => 'required',
            'url_linkedin' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'logo.required' => 'Logo tidak boleh kosong',
            'slogan.required' => 'Slogan tidak boleh kosong',
            'email.required' => 'Email tidak boleh kosong',
            'phone_number.required' => 'Nomer telpon tidak boleh kosong',
            'address.required' => 'Alamat tidak boleh kosong',
            'url_facebook.required' => 'Url tidak boleh kosong',
            'url_twitter.required' => 'Url tidak boleh kosong',
            'url_instagram.required' => 'Url tidak boleh kosong',
            'url_linkedin.required' => 'Url tidak boleh kosong',
        ];
    }
}
