@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h5 class="card-title mb-0">{{ $customer->name }}</h5>
            <div class="btn-group btn-group-sm">
                <a href="{{ route('customers.index') }}" class="btn btn-success">{{ __('Back') }}</a>
                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-info">{{ __('Edit') }}</a>
                <button type="submit" class="btn btn-danger" form="deleteCustomer{{ $customer->id }}">{{ __('Delete') }}</button>
                <form action="{{ route('customers.destroy', $customer) }}" method="post" id="deleteCustomer{{ $customer->id }}">
                    @csrf
                    @method('DELETE')
                </form>
            </div>
        </div>
        <div class="card-body">
            <dl class="row">
                <table class="table border-rounded table-sm">
                    <tr>
                        <td class="table-dark td-title">{{ __("Name") }}</td>
                        <td class="td-content">{{ $customer->name }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark td-title">{{ __("Document Type") }}</td>
                        <td class="td-content">{{ $customer->document_type->fullname }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark td-title">{{ __("ID Number") }}</td>
                        <td class="td-content">{{ $customer->identification}}</td>
                    </tr>
                    <tr>
                        <td class="table-dark td-title">{{ __("Phone:")}}</td>
                        <td class="td-content">{{ $customer->phone_number }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark td-title">{{ __("Cell phone:")}}</td>
                        <td class="td-content">{{ $customer->cell_phone_number }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark td-title">{{ __("Address:")}}</td>
                        <td class="td-content">{{ $customer->address }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark td-title">{{ __("Email:")}}</td>
                        <td class="td-content">{{ $customer->email }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark td-title">{{ __("Created at:")}}</td>
                        <td class="td-content">{{ $customer->created_at }}</td>
                    </tr>
                    <tr>
                        <td class="table-dark td-title">{{ __("Updated at:")}}</td>
                        <td class="td-content">{{ $customer->updated_at }}</td>
                    </tr>
                </table>
            </dl>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">{{ __('Invoices') }}</div>
            @if($customer->invoices()->count() === 0)
            <div class="card-body">
                {{ __('No invoices was found') }}
            </div>
            @else
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>{{ __('Subtotal') }}</th>
                        <th>{{ __('Tax') }}</th>
                        <th>{{ __('Total') }}</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($customer->invoices as $invoice)
                        <tr>
                            <td>{{ $invoice->subtotal }}</td>
                            <td>{{ $invoice->tax }}</td>
                            <td>{{ $invoice->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
    </div>
@endsection
