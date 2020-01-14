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
    <h5> Search</h5>
    <form action="{{ route('customers.index') }}" method="get">
        <div class="col-md-3">
            <label for="document_type_id">{{ __("Document Type") }}</label>
            <select id="document_type_id" name="document_type_id" class="form-control">
                <option value="">--</option>
                @foreach($document_types as $document_type)
                    <option value="{{ $document_type->id }}" {{ $request->get('document_type_id') == $document_type->id ? 'selected' : ''}}>
                        {{ $document_type->fullname }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <label for="identification">{{ __("ID Number") }}</label>
            <input type="number" id="identification" name="identification" class="form-control" placeholder="ID Number" value="{{ $request->get('identification') }}">
        </div>
        <br>
        <div class="form-group row">
            <div class="col-md-3 btn-group btn-group-sm">
                <button type="submit" class="btn btn-primary text-center">
                    <i class="fa fa-search"></i> {{ __("Search") }}
                </button>
                <a href="{{ route('customers.index') }}" class="btn btn-danger text-center">
                    <i class="fa fa-undo"></i> {{ __("Clean") }}
                </a>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">{{ __("Document Type") }}</th>
                    <th scope="col">{{ __("Identification") }}</th>
                    <th scope="col">{{ __("Name") }}</th>
                    <th scope="col">{{ __("Address") }}</th>
                    <th scope="col">{{ __("Email") }}</th>
                    <th scope="col">{{ __("Cell phone") }}</th>
                    <th scope="col">{{ __("Options") }}</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->document_type->name }}</td>
                        <td>
                            <a href="{{ route('customers.show', $customer) }}">
                                 {{ $customer->identification}}
                            </a>
                        </td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->address }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->cell_phone_number }}</td>

                        <td class="text-right">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('customers.show', $customer) }}" class="btn btn-success">{{ __('View') }}</a>
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
