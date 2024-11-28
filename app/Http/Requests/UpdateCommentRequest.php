<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCommentRequest extends FormRequest
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
            'text.required' => 'Поле текста комментария обязательно для заполнения.',
            'text.string' => 'Текст комментария должен быть строкой.',
            'text.max' => 'Текст комментария не может превышать 10,000 символов.',
        ];
    }
}
