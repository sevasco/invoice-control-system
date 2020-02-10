<?php

namespace App\Imports;

use App\Invoice;
use Illuminate\Database\Eloquent\Model;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvoicesImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
     * @param array $row
     *
     * @return Model|null
     * @throws \Exception
     */
    public function model(array $row)
    {

        return new Invoice([
            'code' => $row['number'],
            'issued_at' => $row['issued_at'],
            'expired_at' => $row['expired_at'],
            'received_at' => $row['received_at'],
            'description' => $row['description'],
            'subtotal' => $row['subtotal'],
            'vat' => $row['vat'],
            'total' => $row['total'],
            'seller_id' => $row['seller_id'],
            'customer_id' => $row['customer_id'],
            'status_id' => $row['status_id'],
            'user_id' => $row['user_id'],
        ]);
    }

    public function rules(): array
    {
        return [
            'issued_at' => 'required',
            'expired_at' => 'required',
            'received_at' => 'required',
            'description' => 'required|min:4',
            'subtotal' => 'required',
            'vat' => 'required',
            'total' => 'required',
            'seller_id' => 'required',
            'customer_id' => 'required',
            'status' => 'required',
            'user_id' => 'required',
        ];
    }
}

