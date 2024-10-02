<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdateArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.article.edit', $this->article);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'visible' => ['sometimes', 'boolean'],
            'title' => ['sometimes', 'string'],
            'subHeadline' => ['sometimes', 'string'],
            'article' => ['sometimes', 'string'],
            'image' => ['sometimes', 'string'],
            'video' => ['sometimes', 'string'],
            'audio' => ['sometimes', 'string'],
            'videoUrl' => ['sometimes', 'string'],
            'audioUrl' => ['sometimes', 'string'],
            'file' => ['sometimes', 'string'],
            
        ];
    }

    /**
     * Modify input data
     *
     * @return array
     */
    public function getSanitized(): array
    {
        $sanitized = $this->validated();


        //Add your code for manipulation with request data here

        return $sanitized;
    }
}
