<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsLikeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'news_id' => 'required',
            'user_id' => 'required',
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
            //
        ];
    }
}
