<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class AttachCategoriesRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'categories' => ['required','array'],             // Поле categories обязательно и должно быть массивом
            'categories.*' => ['integer','exists:categories,id'], // Каждый элемент массива должен быть целым числом и существовать в таблице categories
        ];
    }
}
