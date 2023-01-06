<?php

namespace App\Http\Requests\Entrant;

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
            'surname' => ['required', 'string'],
            'patronymic' => ['nullable', 'string'],
            'phone' => ['nullable', 'regex:/(01)[0-9]{9}/'],
            'email' => ['required', 'email', 'unique:users,email'],
            'passport_number' => ['nullable', 'string'],
            'citizenship' => ['nullable', 'string'],

            'user_id' => ['nullable', 'numeric', 'exists:users,id']
        ];
    }

    protected function prepareForValidation()
    {
        $requestData = $this->request->get('entrant');
        $requestData['citizenship'] = $requestData['citizenship'] != "-1" ? $requestData['citizenship'] : null;

        $this->merge($requestData);
    }
}
