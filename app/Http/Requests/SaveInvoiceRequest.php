<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveInvoiceRequest extends FormRequest
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
            'issued_at' => 'required|date',
            'expired_at' => 'required|date|after:issued_at',
            'received_at' => 'nullable|date|after:issued_at|before:expires_at',
            'vat' => 'required|numeric|between:0,100',
            'status_id' => 'nullable|numeric|exists:statuses,id',
            'customer_id' => 'required|numeric|exists:customers,id',
            'seller_id' => 'nullable|numeric|exists:sellers,id',
            'description' => 'nullable|string|max:255'
        ];
    }
}
