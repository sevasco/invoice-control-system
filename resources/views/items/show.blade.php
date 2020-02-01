@extends('layouts.show')
@section('Title', 'Item View')
@section('Back')
    <a href="{{ route('items.index') }}" class="btn btn-secondary">
        <i class="fa fa-arrow-left"></i> {{ __("Back") }}
    </a>
@endsection
@section('Name')
    {{ $item->name }}
@endsection
@section('Buttons')
    @include('items._buttons')
@endsection
@section('Body')
    <table class="table border-rounded table-sm">
        <tr>
            <td class="table-dark td-title">{{ __("Name:") }}</td>
            <td class="td-content">{{ $item->name }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("unit price:") }}</td>
            <td class="td-content">{{ $item->unit_price }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Description:") }}</td>
            <td class="td-content">{{ $item->description }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("Created at:") }}</td>
            <td class="td-content">{{ $item->created_at }}</td>
        </tr>
        <tr>
            <td class="table-dark td-title">{{ __("update at:") }}</td>
            <td class="td-content">{{ $item->updated_at }}</td>
        </tr>
    </table>
@endsection
