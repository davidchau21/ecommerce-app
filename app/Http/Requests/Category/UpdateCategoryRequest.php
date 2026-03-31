<?php

namespace App\Http\Requests\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->isAdmin();
    }

    public function rules(): array
    {
        return [
            'name'        => 'sometimes|required|string|max:255',
            'slug'        => 'sometimes|required|string|unique:categories,slug,' . $this->route('id'),
            'description' => 'nullable|string',
        ];
    }
}
