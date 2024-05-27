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
            'slug' => 'unique:news,slug',
            'photo' => 'required|mimes:jpg,png,jpeg',
            'content' => 'required',
            'category' => 'array|required',
            'category.*' => 'required',
            'sub_category' => 'array|required',
            'sub_category.*' => 'required',
            'tag' => 'array|required',
            'tag.*' => 'required',
            'upload_date' => 'required|date|after_or_equal:'.now()->toDateString(),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'name.unique' => 'Judulnya tidak boleh ada yang sama',
            'photo.required' => 'Foto tidak boleh kosong',
            'content.required' => 'Konten tidak boleh kosong',
            'category.required' => 'Kategori tidak boleh kosong',
            'tags.required' => 'Tags tidak boleh kosong',
            'upload_date.required' => 'Tanggal tidak boleh kosong',
            'sub_category.required' => 'Sub kategori tidak boleh kosong',
        ];
    }
}
