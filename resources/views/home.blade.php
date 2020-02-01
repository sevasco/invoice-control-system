@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <h1 class="text-xl-center"> Menu </h1>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="text-center">
                        <a class="btn btn-primary" href="{{ route('customers.index') }}">{{ __('Customers') }}</a>
                        <a class="btn btn-primary" href="{{ route('invoices.index') }}">{{ __('Invoice') }}</a>
                        <a class="btn btn-primary" href="{{ route('sellers.index') }}">{{ __('Sellers') }}</a>
                        <a class="btn btn-primary" href="{{ route('items.index') }}">{{ __('Items') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
