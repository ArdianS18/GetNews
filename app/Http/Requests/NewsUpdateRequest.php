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
            'multi_photo' => 'array|nullable',
            'multi_photo.*' => 'nullable',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
            'upload_date' => 'required',
            'sub_category_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Judul tidak boleh kosong',
            'name.max' => 'Judul maksimal 150 karakter',
            'name.unique' => 'Judul telah terdaftar',
            'sub_category_id.required' => 'sub kategori tidak boleh kosong',
            'content.required' => 'konten tidak boleh kosong',
            'photo.max' => 'Thumbnail maksimal 5 Mb',
            'photo.mimes' => 'Thumbnail harus berupa jpg,png,jpeg',
            'category_id.required' => 'Kategori tidak boleh kosong',
            'tags.required' => 'Tags tidak boleh kosong',
            'upload_date.required' => 'Tanggal tidak boleh kosong',
            // 'status.required' => 'Status tidak boleh kosong'
        ];
    }
}
