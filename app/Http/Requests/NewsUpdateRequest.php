<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class NewsUpdateRequest extends FormRequest
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
            'photo' => 'nullable|mimes:jpg,png,jpeg',
            'multi_photo' => 'nullable',
            'content' => 'required',
            'category' => 'array|required',
            'category.*' => 'required',
            'sub_category' => 'array|required',
            'sub_category.*' => 'required',
            'tag' => 'array|required',
            'tag.*' => 'required',
            'upload_date' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'photo.required' => 'Foto tidak boleh kosong',
            'multi_photo.required' => 'Foto tidak boleh kosong',
            'content.required' => 'Konten tidak boleh kosong',
            'category.required' => 'Kategori tidak boleh kosong',
            'tag.required' => 'Tags tidak boleh kosong',
            'upload_date.required' => 'Tanggal tidak boleh kosong',
            'sub_category.required' => 'Sub kategori tidak boleh kosong',
        ];
    }
}
