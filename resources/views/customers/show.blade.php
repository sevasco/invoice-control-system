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
                <dt class="col-md-3">{{ __('Name') }}</dt>
                <dd class="col-md-3">{{ $customer->name }}</dd>
                <dt class="col-md-3">{{ __('Identification') }}</dt>
                <dd class="col-md-3">{{ $customer->identification }}</dd>
                <dt class="col-md-3">{{ __('Address') }}</dt>
                <dd class="col-md-9">{{ $customer->address }}</dd>
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
