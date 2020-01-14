@csrf
<div class="row">
    <div class="col form-group">
        <label for="name" class="required">{{ __("Name") }}</label>
        <input type="text" name="name" id="name" value="{{ old('name', $customer->name) }}"
               class="form-control @error('name') is-invalid @enderror" placeholder="Ingresa el nombre">
        @error('name')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="identification" class="required">{{ __("ID Number") }}</label>
        <input type="number" name="identification" id="identification" value="{{ old('identification', $customer->identification) }}"
               class="form-control @error('identification') is-invalid @enderror" placeholder="Ingresa el número de documento">
        @error('identification')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="document_type_id" class="required">{{ __("Document Type") }}</label>
        <select id="document_type_id" name="document_type_id"
                class="form-control @error('document_type_id') is-invalid @enderror">
            <option value="">{{ __("Ingresa el tipo de documento") }} </option>
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
               class="form-control @error('phone_number') is-invalid @enderror" placeholder="Ingresa el número telefónico">
        @error('phone_number')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="cell_phone_number" class="required">{{ __("Cellphone") }}</label>
        <input type="tel" name="cell_phone_number" id="cell_phone_number" value="{{ old('cell_phone_number', $customer->cell_phone_number) }}"
               class="form-control @error('cell_phone_number') is-invalid @enderror" placeholder="Ingresa el número de celular">
        @error('cell_phone_number')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="address" class="required">{{ __("Address") }}</label>
        <input type="text" name="address" id="address" value="{{ old('address', $customer->address) }}"
               class="form-control @error('address') is-invalid @enderror" placeholder="Ingresa la dirección">
        @error('address')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="col">
        <label for="email" class="required">{{ __("Email") }}</label>
        <input type="email" name="email" id="email" value="{{ old('email', $customer->email) }}"
               class="form-control @error('email') is-invalid @enderror" placeholder="Ingresa el correo electrónico">
        @error('email')
        <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<br>
