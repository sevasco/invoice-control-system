@extends('layouts.app')
@section('title', 'Edit Invoice')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ __("Edit Invoice") }} {{ $invoice->id }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('invoices.update', $invoice) }}" class="form-group" method="POST">
                @method('PUT')
                @include('invoices._form')
            </form>
        </div>
    </div>
    <div>
        <div>
            <button class="btn btn-success btn-lg float-right" type="submit" form="invoicesForm">{{ __('Save') }}</button>
            <a class="btn btn-outline- btn-lg float-left" href="{{ route('invoices.index') }}">{{ __('Back') }}</a>
        </div>
    </div>
@endsection
