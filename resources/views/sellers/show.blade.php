@extends('layouts.show')
@section('Title', 'Ver Vendedor')
@section('Back')
    <a href="{{ route('sellers.index') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> {{ __("Back") }}
    </a>
@endsection
@section('Name')
    {{ $seller->name }}
@endsection
@section('Buttons')
    @include('sellers._buttons')
@endsection
@section('Body')
    <table class="table border-rounded table-sm">
        <tr>
            <td class="table-dark td-title">{{ __("Name:") }}</td>
            <td class="td-content">{{ $seller->name }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Document Type:") }}</td>
            <td class="td-content">{{ $seller->document_type->fullname }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Document:") }}</td>
            <td class="td-content">{{ $seller->document }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Phone:")}}</td>
            <td class="td-content">{{ $seller->phone_number }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Cellphone:")}}</td>
            <td class="td-content">{{ $seller->cell_phone_number }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("City:")}}</td>
            <td class="td-content">{{ $seller->City->name }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Address:")}}</td>
            <td class="td-content">{{ $seller->address }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Email:")}}</td>
            <td class="td-content">{{ $seller->email }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Created at:")}}</td>
            <td class="td-content">{{ $seller->created_at }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("updated at:")}}</td>
            <td class="td-content">{{ $seller->updated_at }}</td>
        </tr>
    </table>
    <table>
        <tr>
            <div class="card mt-3">
                <div class="card-header text-center" >{{ __('Invoices') }}</div>
                @if($seller->invoices->isEmpty())
                    <div class="card-body">
                        {{ __('Invoices was not found') }}
                    </div>
                @else
                    <ul>
                        @foreach($seller->invoices as $invoice)
                            <li>
                                <a href="{{ route('invoices.show', $invoice) }}" target="_blank">
                                    {{ __("invoice No.")}} {{ $invoice->id }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endisset
            </div>
    </table>
@endsection
