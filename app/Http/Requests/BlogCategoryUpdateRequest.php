<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogCategoryUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    private $id=0;
    public function authorize()
    {
        // в будущем проверка на авторизацию пользователя
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>'max:255',
            'slug'=>Rule::unique('blog_categories')->ignore($this->route('category')),
            'parent_id'=>'integer|exists:blog_categories,id'
        ];
    }
    public function messages()
    {
        return [
            'slug.unique'=>'такой слаг уже существует'
        ];
    }
}
