@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">Customers</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary btn-lg" href="/customers/create"> Create new customer</a>
            <br></br>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>{{ __('Identification') }}</th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Address') }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->identification }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('customers.show', $customer) }}" class="btn btn-info">{{ __('View') }}</a>
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-info">{{ __('Edit') }}</a>
                                <button type="submit" class="btn btn-danger" form="deleteCustomer{{ $customer->id }}">{{ __('Delete') }}</button>
                                <form action="{{ route('customers.destroy', $customer) }}" method="post" id="deleteCustomer{{ $customer->id }}">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
