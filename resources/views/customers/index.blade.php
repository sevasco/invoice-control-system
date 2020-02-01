@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">Customers</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <a class="btn btn-primary btn-lg float-right" href="{{ route('customers.create') }}"> {{ __('Create new customer')}}</a>
            <a class="btn btn-outline-info btn-lg" href="{{ route('home') }}">{{ __('Go Home') }}</a>
            <br></br>
        </div>
    </div>

    <nav class="navbar navbar-light bg-light">
        <form class="form-inline">
            <select name="type" class="form-control mr-sm-2" id="select">
                <option value="">{{ __('Filter by') }}</option>
                <option value="document">{{ __('ID') }}</option>
                <option value="name">{{ __('Name') }}</option>
                <option value="email">{{ __('Email') }}</option>
            </select>

            <input name="searchfor" class="form-control mr-sm-2" type="search" placeholder="{{ __('Search...') }}">

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> {{ __('Search') }}</button>
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" onClick="window.history.back();">
                <i class="fas fa-redo-alt"></i> {{ __('Refresh') }}</button>
        </form>
    </nav>

    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead class="table-dark text-center">
                <tr>
                    <th scope="col">{{ __("Document Type") }}</th>
                    <th scope="col">{{ __("Document") }}</th>
                    <th scope="col">{{ __("Name") }}</th>
                    <th scope="col">{{ __("City") }}</th>
                    <th scope="col">{{ __("Address") }}</th>
                    <th scope="col">{{ __("Email") }}</th>
                    <th scope="col">{{ __("Cell phone") }}</th>
                    <th scope="col">{{ __("Options") }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody class="text-center">
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->document_type->name }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer) }}">
                                 {{ $customer->document}}
                            </a>
                        </td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->City->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->cell_phone_number }}</td>
                        <td class="text-right">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('customers.show', $customer) }}" class="btn btn-success">{{ __('View') }}</a>
                                <a href="{{ route('customers.edit', $customer) }}" class="btn btn-info">{{ __('Edit') }}</a>
                                <button type="submit" class="btn btn-danger" form="deleteCustomer{{ $customer->id }}" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
                                <form action="{{ route('customers.destroy', $customer) }}" method="post" id="deleteCustomer{{ $customer->id }}" >
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <ul class="pagination justify-content-center">
                {{ $customers->links() }}
            </ul>

        </div>
    </div>
@endsection
