@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col">
            <h1 class="text-xl-center">New Customer</h1>
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
            <button class="btn btn-primary btn-lg" type="submit" form="customersForm">Save</button>
            <a class="btn btn-secondary btn-lg float-right" href="{{ route('customers.index') }}">Back</a>
        </div>
    </div>



@endsection
