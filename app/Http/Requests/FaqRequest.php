<?php

namespace App\Http\Requests;

class FaqRequest extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'question' => 'required',
            'answer' => 'required',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */

    public function messages(): array
    {
        return [
            'question.required' => 'Nama tidak boleh kosong',
            'answer.required' => 'Hobi tidak boleh kosong',
        ];
    }
}