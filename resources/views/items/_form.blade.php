@csrf
<div class="row">
    <div class="col">
        <label for="name" class="required">{{ __("Name") }}</label>
        <input type="text" name="name" id="name" value="{{ old('name', $item->name) }}"
               class="form-control @error('name') is-invalid @enderror">
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="unit_price" class="required">{{ __("Unit price") }}</label>
        <input type="text" name="unit_price" id="unit_price" value="{{ old('unit_price', $item->unit_price) }}"
               class="form-control @error('unit_price') is-invalid @enderror">
        @error('unit_price')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row">
    <div class="col">
        <label for="description">{{ __("Description") }}</label>
        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">
            {{ old('description', $item->description) }}
        </textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
