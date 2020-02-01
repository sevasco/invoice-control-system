<?php

namespace App\Http\Requests\Sellers;

use Illuminate\Validation\Rule;
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
            'name' => 'required|string|min:3|max:50',
            'document' => [
                'required',
                'numeric',
                'digits_between:8,10',
                Rule::unique('sellers')->ignore($this->route('seller'))
            ],
            'document_type_id' => 'required|numeric|exists:document_types,id',
            'phone_number' => 'nullable|numeric|digits_between:7,12',
            'cell_phone_number' => 'required|numeric|digits:10',
            'city_id' => 'required',
            'address' => 'required|string|min:5|max:100',
            'email' => [
                'required',
                'email',
                'string',
                'min:5',
                'max:100',
                Rule::unique('sellers')->ignore($this->route('seller'))
            ]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter the full name.',
            'name.min:5'  => 'The name must be at least 5 characters.',
            'document.required' => 'Please enter the identification number.',
            'document.numeric'  => 'Enter a valid identification number.',
            'document.unique'  => 'The identification number already exists.',
            'email.required' => 'Please enter the identification number.',
            'email.email'  => 'Enter a valid email with the format "example@mail.com".',
            'email.unique'  => 'The email already exists.',
            'city_id.required' => 'Please select the city name of residence.',
        ];
    }
}
