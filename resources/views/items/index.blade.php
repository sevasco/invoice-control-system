@extends('layouts.index')
@section('Title', 'Items')
@section('Name', 'Items')
@section('Create')
    <a class="btn btn-outline-info" href="{{ route('home') }}">{{ __('Go Home') }}</a>
    <a class="btn btn-success" href="{{ route('items.create') }}">{{ __("New Item") }}</a>
@endsection
@section('Search')
    <nav class="navbar navbar-light bg-light">
        <!-- Search form -->
        <form class="form-inline">
            <select name="type" class="form-control mr-sm-2" id="select">
                <option value="">{{ __('Filter by') }}</option>
                <option value="name">{{ __('Name') }}</option>
                <option value="unit_price">{{ __('Unit Price') }}</option>
            </select>

            <input name="searchfor" class="form-control mr-sm-2" type="search" placeholder="{{ __('Search...') }}">

            <button class="btn btn-outline-success my-2 my-sm-0" type="submit"><i class="fas fa-search"></i> {{ __('Search') }}</button>
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit" onClick="window.history.back();">
                <i class="fas fa-redo-alt"></i> {{ __('Refresh') }}</button>
        </form>
    </nav>
@endsection
@section('Header')
    <th scope="col">{{ __("Code") }}</th>
    <th scope="col">{{ __("Name") }}</th>
    <th scope="col">{{ __("Unit price") }}</th>
    <th scope="col" nowrap>{{ __("Created at") }}</th>
    <th scope="col" nowrap>{{ __("Updated at") }}</th>
    <th scope="col" nowrap>{{ __("Options") }}</th>
@endsection
@section('Body')
    @foreach($items as $item)
        <tr class="text-center">
            <td>{{ $item->id }}</td>
            <td>
                <a href="{{ route('items.show', $item) }}">
                    {{ $item->name }}
                </a>
            </td>
            <td nowrap>$ {{ number_format($item->unit_price, 2) }}</td>
            <td nowrap>{{ $item->created_at }}</td>
            <td nowrap>{{ $item->updated_at }}</td>
            <td class="btn-group btn-group-sm" nowrap>
                <div class="btn-group btn-group-sm">
                    <a href="{{ route('items.show', $item) }}" class="btn btn-success">{{ __('View') }}</a>
                    <a href="{{ route('items.edit', $item) }}" class="btn btn-info">{{ __('Edit') }}</a>
                    <button type="submit" class="btn btn-danger" form="deleteSeller{{ $item->id }}" onclick="return confirm('Are you sure?')">{{ __('Delete') }}</button>
                    <form action="{{ route('items.destroy', $item) }}" method="post" id="deleteSeller{{ $item->id }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
@endsection
@section('Links')
    {{ $items->appends($request->all())->links() }}
@endsection
