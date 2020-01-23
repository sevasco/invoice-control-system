@extends('layouts.app')
@section('title', 'Add Detail')
@section('content')
    <div class="card">
        <div class="card-header">
            <h1>{{ __("Add detail. Invoice No.") }} {{ $invoice->id }}</h1>
        </div>
        <div class="card-body">
            <form action="{{ route('invoiceDetails.store', $invoice) }}" class="form-group" method="POST" id="invoiceDetailForm">
                @csrf
                <div class="row">
                    <div class="col">
                        <label class="required">{{ __("Item") }}</label>
                        <input type="hidden" id="old_item_name" name="old_item_name" value="{{ old('item') }}">
                        <input type="hidden" id="old_item_id" name="old_item_id" value="{{ old('item_id') }}">
                        <v-select v-model="old_item_values" label="name" :filterable="false" :options="options" @search="searchItem"
                                   class="form-control @error('item_id') is-invalid @enderror">
                            <template slot="no-options">
                                {{ __("Enter the item name...") }}
                            </template>
                        </v-select>
                        <input type="hidden" name="item" id="item" :value="(old_item_values) ? old_item_values.name : '' ">
                        <input type="hidden" name="item_id" id="item_id" :value="(old_item_values) ? old_item_values.id : '' ">
                        @error('item_id')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @include('invoices.details._form', ['quantity' => "", 'unit_price' => ""])
                </div>
                <br>
                @include('invoices.details._buttons')
            </form>
        </div>
    </div>
    <div>
        <div>
            <button class="btn btn-success btn-lg float-right" type="submit" form="invoiceDetailForm">{{ __('Save') }}</button>
            <a class="btn btn-outline- btn-lg float-left" href="{{ route('invoices.index') }}">{{ __('Back') }}</a>
        </div>
    </div>
@endsection
