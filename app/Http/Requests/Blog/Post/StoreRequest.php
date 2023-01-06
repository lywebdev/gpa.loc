<?php

namespace App\Http\Requests\Blog\Post;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'title' => ['required', 'string'],
            'category_id' => ['nullable', 'numeric'],
            'content' => ['required', 'string'],
        ];
    }

    protected function prepareForValidation()
    {
        $requestData = $this->request->get('post');
        $title = $requestData['title'];
        $categoryId = $requestData['category_id'] == -1 ? null : (int) $requestData['category_id'];
        $content = $requestData['content'] ?? null;

        $this->merge([
            'title' => $title,
            'category_id' => $categoryId,
            'content' => $content
        ]);
    }
}
