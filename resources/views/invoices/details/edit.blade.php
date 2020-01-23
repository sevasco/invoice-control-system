@extends('layouts.app')
@section('title', 'Edit Detail')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ __("Edit Detail. Invoice No.") }} {{ $invoice->id }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('invoiceDetails.update', [$invoice, $item]) }}" class="form-group" method="POST" id="invoiceDetailForm">
                @method('PUT') @csrf
                <div class="row">
                    <div class="col">
                        <label>{{ __("item") }}</label>
                        <span class="form-control">
                            {{ $item->name }}
                        </span>
                    </div>
                    @include('invoices.details._form', [
                        'quantity' => $invoice->items->find($item->id)->pivot->quantity,
                        'unit_price' => $invoice->items->find($item->id)->pivot->unit_price
                    ])
                </div>
                <br>
                @include('invoices.details._buttons')
            </form>
        </div>
    </div>
    <div>
        <div>
            <button class="btn btn-success btn-lg float-right" type="submit" form="invoiceDetailForm">{{ __('Save') }}</button>
            <a class="btn btn-outline- btn-lg float-left" href="{{ route('invoices.index') }}">{{ __('Back') }}</a>
        </div>
    </div>
@endsection
