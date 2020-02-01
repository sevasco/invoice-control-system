@extends('layouts.index')
@section('Title', 'Items')
@section('Name', 'Items')
@section('Create')
    <a class="btn btn-outline-info" href="{{ route('home') }}">{{ __('Go Home') }}</a>
    <a class="btn btn-success" href="{{ route('items.create') }}">{{ __("New Item") }}</a>
@endsection
@section('Search')
    <form action="{{ route('items.index') }}" method="get">
        <div class="form-group row">
            <div class="col-md-3">
                <label>{{ __("Name") }}</label>
                <input type="hidden" id="old_product_name" name="old_product_name" value="{{ $request->get('item') }}">
                <input type="hidden" id="old_product_id" name="old_product_id" value="{{ $request->get('item_id') }}">
                <v-select v-model="old_product_values" label="name" :filterable="false" :options="options" @search="searchItem"
                          class="form-control">
                    <template slot="no-options">
                        {{ __("Enter the item name...") }}
                    </template>
                </v-select>
                <input type="hidden" name="item" id="item" :value="(old_product_values) ? old_product_values.name : '' ">
                <input type="hidden" name="item_id" id="item_id" :value="(old_product_values) ? old_product_values.id : '' ">
            </div>
        </div>
        <div class="form-group row">
            <div class="col-md-3 btn-group btn-group-sm">
                <button type="submit" class="btn btn-primary">
                    <i class="fa fa-search"></i> {{ __("Search") }}
                </button>
                <a href="{{ route('items.index') }}" class="btn btn-danger">
                    <i class="fa fa-undo"></i> {{ __("Clean") }}
                </a>
            </div>
        </div>
    </form>
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
                    <button type="submit" class="btn btn-danger" form="deleteSeller{{ $item->id }}">{{ __('Delete') }}</button>
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
