<table>
    <thead>
    <tr>
        <th>{{ __("Number") }}</th>
        <th>{{ __("Created at") }}</th>
        <th>{{ __("Expired at") }}</th>
        <th>{{ __("Received_at") }}</th>
        <th>{{ __("VAT") }}</th>
        <th>{{ __("Description") }}</th>
        <th>{{ __("Status") }}</th>
        <th>{{ __("Customer") }}</th>
        <th>{{ __("Seller") }}</th>
    </tr>
    </thead>
    <tbody>
    @foreach($invoices as $invoice)
        <tr>
            <td>{{ $invoice->number }}</td>
            <td>{{ $invoice->issued_at }}</td>
            <td>{{ $invoice->expired_at }}</td>
            <td>{{ $invoice->received_at }}</td>
            <td>{{ $invoice->vat }}</td>
            <td>{{ $invoice->description }}</td>
            <td>{{ $invoice->status_id }}</td>
            <td>{{ $invoice->customer_id }}</td>
            <td>{{ $invoice->seller_id }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
