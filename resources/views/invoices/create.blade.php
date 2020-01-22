@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">{{ __('New invoice') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card-body">
                <form action="{{ route('invoices.store') }}" class="form-group" method="POST">
                    @include('invoices.__form')
                </form>
            </div>
        </div>
    </div>
    <div>
        <div>
            <button class="btn btn-success btn-lg float-right" type="submit">{{ __('Save') }}</button>
            <a class="btn btn-outline- btn-lg float-left" href="{{ route('invoices.index') }}">{{ __('Back') }}</a>
        </div>
    </div>



@endsection
