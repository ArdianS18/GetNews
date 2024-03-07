<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsLikeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true; // Ganti dengan logika otorisasi Anda sesuai kebutuhan
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'news_id' => 'required|exists:news,id', // Pastikan news_id ada dalam tabel news
            'status' => 'required|boolean',
        ];
    }

    /**
     * Custom validation messages.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'news_id.required' => 'News ID harus diisi.',
            'news_id.exists' => 'News ID tidak valid.',
            'status.required' => 'Status harus diisi.',
            'status.boolean' => 'Status harus berupa boolean.',
        ];
    }
}
