<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'text' => 'sometimes|required|string|max:10000',
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => 'Поле текста поста обязательно для заполнения.',
            'text.string' => 'Текст поста должен быть строкой.',
            'text.max' => 'Текст поста не может превышать 10,000 символов.',
        ];
    }
}
