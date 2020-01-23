@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">{{ __('New customer') }}</h1>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <form action="{{ route('customers.store') }}" method="post" id="customersForm">
                @include('customers.__form')
            </form>
        </div>
    </div>


    <div>
        <div>
            <a class="btn-link text-black-50 float-left" href="{{ route('customers.index') }}">{{ __('Back') }}</a>
            <button class="btn btn-success btn-lg float-right" type="submit" form="customersForm">{{ __('Save')}}</button>
        </div>
    </div>



@endsection
