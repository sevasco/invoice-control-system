<?php

namespace App\Http\Requests\Customers;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'identification' => 'required|numeric|digits_between:6,12',
            'document_type_id' => 'required|numeric|exists:document_types,id',
            'phone_number' => 'nullable|numeric|digits_between:7,12',
            'cell_phone_number' => 'required|numeric|digits:10',
            'address' => 'required|string|min:5|max:250',
            'email' => 'required|email|string|min:5|max:100',
        ];
    }
}
