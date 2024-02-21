<?php

namespace App\Http\Requests;

use Illuminate\Database\Console\Migrations\StatusCommand;
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
            'photo' => 'required|max:150|mimes:jpg,png,jpeg',
            'content' => 'required',
            'sinopsis' => 'required',
            'sub_category_id' => 'required|exists:sub_categories,id',
            'status' => 'required'
        ];
    }
}
