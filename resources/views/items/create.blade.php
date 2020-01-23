@extends('layouts.app')
@section('title', 'New item')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ __("New item") }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('items.store') }}" class="form-group" method="POST" id="itemsForm">
                @include('items._form')
            </form>
        </div>
    </div>
    <div class="form-group">
        <br>
        <button class="btn btn-success btn-lg float-right" type="submit" href="{{ route('items.index') }}" form="itemsForm">{{ __('Save') }} </button>
        <a class="tn-link text-black-50 btn-lg float-left" href="{{ route('items.index') }}" >{{ __('Back') }}</a>
    </div>
@endsection
