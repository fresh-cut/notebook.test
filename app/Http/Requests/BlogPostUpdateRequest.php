<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BlogPostUpdateRequest extends FormRequest
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
            'title'=>'required|min:3|max:255',
            'slug'=>Rule::unique('blog_posts')->ignore($this->route('post')),
            'excerpt'=>'max:500',
            'content_raw'=>'required|string|min:5|max:10000',
            // то значение которое приходит, должно быть в таблице блог_категории и поле ид
            'category_id'=>'required|integer|exists:blog_categories,id'
        ];
    }
    public function messages()
    {
        return [
            'slug.unique'=>'Такой идентификатор уже существует',
            'title'=>'Заголовок должен быть больше 3 символов'
        ];
    }
}
