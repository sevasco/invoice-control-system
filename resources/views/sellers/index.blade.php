@extends('layouts.index')
@section('Title', 'Sellers')
@section('Name', 'Sellers')
@section('Create')
    <a class="btn btn-outline-info" href="{{ route('home') }}">{{ __('Go Home') }}</a>
    <a class="btn btn-success" href="{{ route('sellers.create') }}">{{ __("New Seller") }}</a>
@endsection
@section('Search')
    <form action="{{ route('sellers.index') }}" method="get">
        <div class="form-group row">
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
                <label for="document">{{ __("Document") }}</label>
                <input type="number" id="document" name="document" class="form-control" placeholder="Document No." value="{{ $request->get('document') }}">
            </div>
            <div class="col-md-3">
                <label for="email">{{ __("Email") }}</label>
                <input type="text" id="email" name="email" class="form-control" placeholder="Email" value="{{ $request->get('email') }}">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 btn-group btn-group-sm">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i> {{ __("Search") }}
                </button>
                <a href="{{ route('sellers.index') }}" class="btn btn-danger">
                    <i class="fa fa-undo"></i> {{ __("Clean") }}
                </a>
            </div>
        </div>
    </form>
@endsection
@section('Header')
    <th scope="col">{{ __("Document Type") }}</th>
    <th scope="col">{{ __("Document") }}</th>
    <th scope="col">{{ __("Name") }}</th>
    <th scope="col">{{ __("City") }}</th>
    <th scope="col">{{ __("Address") }}</th>
    <th scope="col">{{ __("Email") }}</th>
    <th scope="col">{{ __("Cell phone") }}</th>
    <th scope="col">{{ __("Options") }}</th>
    <th></th>
@endsection
@section('Body')
    @foreach($sellers as $seller)
        <tr class="text-center">
            <td>{{ $seller->document_type->name }}</td>
            <td>
                <a href="{{ route('sellers.show', $seller) }}">
                    {{ $seller->document}}
                </a>
            </td>
            <td>{{ $seller->name }}</td>
            <td>{{ $seller->City->name }}</td>
            <td>{{ $seller->address }}</td>
            <td>{{ $seller->email }}</td>
            <td>{{ $seller->cell_phone_number }}</td>
            <td class="text-right">
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('sellers.show', $seller) }}" class="btn btn-success">{{ __('View') }}</a>
                    <a href="{{ route('sellers.edit', $seller) }}" class="btn btn-info">{{ __('Edit') }}</a>
                    <button type="submit" class="btn btn-danger" form="deleteSeller{{ $seller->id }}" onclick="return confirm('Are you sure?')">{{ __('Delete')  }}</button>
                    <form action="{{ route('sellers.destroy', $seller) }}" method="post" id="deleteSeller{{ $seller->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
@endsection
@section('Links')
    {{ $sellers->appends($request->all())->links() }}
@endsection

