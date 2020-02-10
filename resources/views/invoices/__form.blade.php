@csrf
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="issued_at">{{ __('Expedition date') }}</label>
            <input type="date" class="form-control" id="issued_at" name="issued_at"
                   value="{{ old('issued_at', now()->toDateString()) }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="expired_at">{{ __('Expiration date') }}</label>
            <input type="date" class="form-control" id="expired_at" name="expired_at"
                   value="{{ old('expired_at', now()->addDays(30)->toDateString()) }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="received_at">{{ __('Receive date') }}</label>
            <input type="date" class="form-control" id="received_at" name="received_at"
                   value="{{ old('received_at', $invoice->received_at) }}" required>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="seller_id">{{ __('Seller') }}</label>
            <select class="custom-select" id="seller_id" name="seller_id" required>
                <option value="">{{ __('Select seller') }}</option>
                @foreach($sellers as $seller)
                    <option value="{{ $seller->id }}"
                        {{ old('seller_id', $invoice->seller_id) == $seller->id ? 'selected' : ''}}>{{ $seller->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="customer_id">{{ __('Customer') }}</label>
            <select class="custom-select" id="customer_id" name="customer_id" required>
                <option value="">{{ __('Select customer') }}</option>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}"
                        {{ old('customer_id', $invoice->customer_id) == $customer->id ? 'selected' : ''}}>{{ $customer->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="status">{{ __('Status') }}</label>
            <select id="status" name="status" class="custom-select">
                <option value="">{{ __('Select status') }}</option>
                @foreach($statuses as $status)
                    <option value="{{ $status->id }}"
                        {{ old('status', $invoice->status_id) == $status->id ? 'selected' : ''}}>{{ $status->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label for="description">{{ __('Sale description') }}</label>
            <textarea class="form-control" id="description" name="description"
                      placeholder="{{ __('Type a sale description') }}" required>{{ old('description', $invoice->description) }}
            </textarea>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header pb-0">
                <h4 class="card-title"><strong>{{ __('Items') }}
                        {{ $invoice->code }}</strong></h4>
            </div>
            <div class="row col-sm-10">
                <div class="form-group col-md-4">
                    <label for="">{{ __('Item name') }}</label><br>
                    <select class="custom-select" id="product_id" name="product[1][id]">
                        <option value="">{{ __('Select a item name') }}</option>
                        @foreach($items as $item)
                            <option value="{{ $item->id }}"
                                {{ old('item_id')[0] == $item->id ? 'selected' : '' }}>{{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">{{ __('Price') }}</label><br>
                    <input type="number" class="form-control" id="price" name="product[1][price]"
                           placeholder="{{ __('Type a product price') }}" value="{{ old('price')[0] }}">
                </div>
                <div class="form-group col-md-4">
                    <label for="quantity">{{ __('Quantity') }}</label><br>
                    <input type="number" class="form-control" id="quantity" name="product[1][quantity]"
                           placeholder="{{ __('Type a quantity') }}" value="{{ old('quantity')[0] }}">
                </div>
                <div class="input-group-btn">
                    <button type="button" id="add" class="btn btn-sm btn-success"><i
                            class="fas fa-fw fa-plus"> Add items</i></button>
                    <br><br>
                </div>
            </div>
        </div>
    </div>
</div>
