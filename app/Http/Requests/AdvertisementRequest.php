<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdvertisementRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => 'required',
            'page' => 'required',
            'position' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'url' => 'required|url',
            'photo' => 'required',  
        ];
    }

    public function messages():array
    {
        return[
            'type.required' => 'Kolom tipe harus diisi.',
            'page.required' => 'Kolom halaman harus diisi.',
            'position.required' => 'Kolom posisi harus diisi.',
            'start_date.required' => 'Kolom tanggal mulai harus diisi.',
            'end_date.required' => 'Kolom tanggal selesai harus diisi.',
            'url.required' => 'Kolom URL harus diisi.',
            'url.url' => 'Kolom URL harus berisi URL yang valid.',
            'photo.required' => 'Kolom foto harus diisi.',
        ];
    }
}
