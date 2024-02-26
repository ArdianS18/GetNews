<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'photo' => 'required|mimes:jpg,png,jpeg',
            'content' => 'required',
            'sinopsis' => 'required',
            'sub_category_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'photo.required' => 'Foto tidak boleh kosong',
            'content.required' => 'Konten tidak boleh kosong',
            'sinopsis.required' => 'Sinopsis tidak boleh kosong',
            'sub_category_id.required' => 'sub kategori tidak boleh kosong',
        ];
    }
}
