<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class SaveSellerRequest extends FormRequest
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
            'document' => [
                'required',
                'numeric',
                'digits_between:8,10',
                Rule::unique('sellers')->ignore($this->route('seller'))
            ],
            'document_type_id' => 'required|numeric|exists:document_types,id',
            'name' => 'required|string|min:3|max:50',
            'phone_number' => 'nullable|numeric|digits_between:7,12',
            'cell_phone_number' => 'required|numeric|digits:10',
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
}
