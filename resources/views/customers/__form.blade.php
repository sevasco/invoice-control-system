@csrf
<div class="row">
    <div class="col form-group">
        <label for="name" class="required">{{ __("Name") }}</label>
        <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}"
               class="form-control @error('name') is-invalid @enderror" placeholder="Enter the name">
        @error('name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="document" class="required">{{ __("ID Number") }}</label>
        <input type="number" name="document" id="document" value="{{ old('document', $customer->document) }}"
               class="form-control @error('document') is-invalid @enderror" placeholder="Enter the document number">
        @error('document')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="document_type_id" class="required">{{ __("Document Type") }}</label>
        <select id="document_type_id" name="document_type_id"
                class="form-control @error('document_type_id') is-invalid @enderror">
            <option value="">{{ __("Choose the type of document") }} </option>
            @foreach($document_types as $document_type)
                <option value="{{ $document_type->id }}" {{ old('document_type_id', $customer->document_type_id) == $document_type->id ? 'selected' : '' }}>
                    {{ $document_type->fullname }}
                </option>
            @endforeach
        </select>
        @error('document_type_id')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col">
        <label for="phone_number">{{ __("Phone number") }}</label>
        <input type="tel" name="phone_number" id="phone_number" value="{{ old('phone_number', $customer->phone_number) }}"
               class="form-control @error('phone_number') is-invalid @enderror" placeholder="Enter the phone number">
        @error('phone_number')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="cell_phone_number" class="required">{{ __("Cellphone") }}</label>
        <input type="tel" name="cell_phone_number" id="cell_phone_number" value="{{ old('cell_phone_number', $customer->cell_phone_number) }}"
               class="form-control @error('cell_phone_number') is-invalid @enderror" placeholder="Enter the cellphone number">
        @error('cell_phone_number')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="city_id" class="required">{{ __("City") }}</label>
        <select id="city_id" name="city_id"
                class="form-control @error('city_id') is-invalid @enderror">
            <option value="">{{ __("Choose the city") }} </option>
            @foreach($cities as $city)
                <option value="{{ $city->id }}" {{ old('city_id', $customer->city_id) == $city->id ? 'selected' : '' }}>
                    {{ $city->name }}
                </option>
            @endforeach
        </select>
        @error('city_id')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="address" class="required">{{ __("Address") }}</label>
        <input type="text" name="address" id="address" value="{{ old('address', $customer->address) }}"
               class="form-control @error('address') is-invalid @enderror" placeholder="Enter the address">
        @error('address')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="email" class="required">{{ __("Email") }}</label>
        <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}"
               class="form-control @error('email') is-invalid @enderror" placeholder="Enter the email">
        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<br>
