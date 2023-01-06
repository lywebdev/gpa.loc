<?php

namespace App\Http\Requests\Blog\Category;

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
            'name' => ['required', 'string'],
            'parent_id' => ['nullable', 'numeric'],
            '_lft' => ['nullable', 'numeric'],
            '_rgt' => ['nullable', 'numeric'],
        ];
    }

    protected function prepareForValidation()
    {
        $requestData = $this->request->get('category');
        $name = $requestData['name'];
        $parentId = $requestData['parent_id'] == -1 ? null : (int) $requestData['parent_id'];

        $this->merge([
            'name' => $name,
            'parent_id' => $parentId
        ]);
    }
}
