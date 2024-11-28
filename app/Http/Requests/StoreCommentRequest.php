<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCommentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true; // Можно добавить авторизацию
    }

    public function rules(): array
    {
        return [
            'text' => 'required|string|max:10000',
            'post_id' => 'required|exists:posts,id',
            'parent_id' => 'nullable|exists:comments,id',
            'tree_id' => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'text.required' => 'Поле текста комментария обязательно для заполнения.',
            'text.string' => 'Текст комментария должен быть строкой.',
            'text.max' => 'Текст комментария не может превышать 10,000 символов.',
            'post_id.required' => 'Необходимо указать ID поста.',
            'post_id.exists' => 'Пост с указанным ID не найден.',
            'parent_id.exists' => 'Родительский комментарий с указанным ID не найден.',
            'tree_id.integer' => 'Tree ID должен быть числом.',
        ];
    }
}
