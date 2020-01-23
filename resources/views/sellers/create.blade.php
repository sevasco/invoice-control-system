@extends('layouts.app')
@section('title', 'Crear Vendedor')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ __("New Seller") }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('sellers.store') }}" class="form-group" method="POST" id="sellersForm">
                @include('sellers._form')
            </form>
        </div>
    </div>
    <div class="form-group">
        <br>
        <button class="btn btn-success btn-lg float-right" type="submit" href="{{ route('sellers.index') }}" form="sellersForm">{{ __('Save') }} </button>
        <a class="tn-link text-black-50 btn-lg float-left" href="{{ route('sellers.index') }}" >{{ __('Back') }}</a>
    </div>





@endsection
