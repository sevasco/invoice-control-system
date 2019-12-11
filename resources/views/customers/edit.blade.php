@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">{{ __('Edit customer') }}</h1>
        </div>
    </div>


    <div class="row">
        <div class="col">
            <form action="{{ route('customers.update', $customer) }}" method="post" id="customersForm">
                @method('PUT')
                @include('customers.__form')
            </form>
        </div>
    </div>


    <div>
        <div>
            <button class="btn btn-primary btn-lg" type="submit" form="customersForm">{{ __('Update') }}</button>
            <a class="btn btn-secondary btn-lg float-right" href="{{ route('customers.index') }}">Back</a>
        </div>
    </div>



@endsection
