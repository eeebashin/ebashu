<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Можно добавить авторизацию, если нужно
    }

    public function rules(): array
    {
        return [
            'text' => ['required','string','max:10000'],
            'date' => now(),
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
