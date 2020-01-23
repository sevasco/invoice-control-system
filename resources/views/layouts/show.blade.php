@extends('layouts.app')
@section('title')
    @yield('Title')
@endsection
@section('content')
    @yield('Back')
    <p></p>
    <div class="card card-default">
        <div class="card-header d-flex justify-content-between">
            <h3 class="card-title mb-0">@yield('Name')</h3>
            <div>
                <div class="btn-group btn-group-sm">
                    @yield('Buttons')
                </div>
            </div>
        </div>
        <div class="card-body">
            @yield('Body')
        </div>
    </div>
@endsection
