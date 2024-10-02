<?php

namespace App\Http\Requests\Admin\Article;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class StoreArticle extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return Gate::allows('admin.article.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'visible' => ['required', 'boolean'],
            'title' => ['required', 'string'],
            'subHeadline' => ['required', 'string'],
            'article' => ['required', 'string'],
            'image' => ['required', 'string'],
            'video' => ['required', 'string'],
            'audio' => ['required', 'string'],
            'videoUrl' => ['required', 'string'],
            'audioUrl' => ['required', 'string'],
            'file' => ['required', 'string'],
            
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
