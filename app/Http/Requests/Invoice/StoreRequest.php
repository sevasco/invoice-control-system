<?php

namespace App\Http\Requests\Invoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        //dd($this->all());
        return [
            'issued_at' => 'required|date',
            'expired_at' => 'required|date|after_or_equal:issued_at',
            'received_at' => 'required|date|after_or_equal:issued_at',
            'seller_id' => 'required|numeric|exists:sellers,id',
            'description' => 'required|min:4',
            'customer_id' => 'required',
            'status' => 'required',
            'item_id' => 'required',
            'item_price' => 'required|numeric',
            'item_quantity' => 'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'issued_at.required' => 'Please enter the expedition date.',
            'issued_at.date'  => 'Enter a valid date.',

            'expired_at.required' => 'Please enter the due date.',
            'expired_at.date'  => 'Enter a valid date.',
            'expired_at.after_or_equal:issued_at'  => 'The due date must be after or equal to the expedition date.',

            'received_at.required' => 'Please enter the receipt date.',
            'received_at.date'  => 'Enter a valid date.',
            'received_at.after_or_equal:issued_at'  => 'The receipt date must be after or equal to the expedition date.',

            'seller_id.required' => 'Please select a seller name.',
            'seller_id.numeric' => 'Enter a valid seller.',

            'description.required' => 'Please  enter the sale description.',
            'description.min:4' => 'The sale description must be at least 4 characters.',

            'customer_id.required' =>  'Please select a customer name.',

            'status.required' =>  'Please select the invoice status.',

            'item_id.required' => 'Please select the item name.',
            'item_price.required'  => 'Please enter the item price.',
            'item_price.numeric'  => 'Enter a valid price.',
            'item_quantity.required' => 'Please enter the unit price the item.',
            'item_quantity.integer' => 'Please enter the unit price the item.',
        ];
    }
}

