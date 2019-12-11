@csrf
<div class="form-group">
    <label for="name" class="form-label">{{ __('Name') }}</label>
    <input type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" id="name" name="name" placeholder="{{ __('Name of customer') }}" value="{{ old('name', $customer->name) }}" required>

    @includeWhen($errors->has('name'), 'layouts.__validation_error_feedback', ['message' => $errors->first('name')])
</div>

<div class="form-group">
    <label for="identification" class="form-label">{{ __('Identification') }}</label>
    <input type="text" name="identification" class="form-control{{ $errors->has('identification') ? ' is-invalid' : '' }}" placeholder="{{ __('Identification number') }}" value="{{ old('identification', $customer->identification) }}" required>

    @includeWhen($errors->has('identification'), 'layouts.__validation_error_feedback', ['message' => $errors->first('identification')])
</div>

<div class="form-group">
    <label for="address" class="form-label">{{ __('Address') }}</label>
    <input type="text" name="address" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="{{ __('Address of customer') }}" value="{{ old('address', $customer->address) }}" required>

    @includeWhen($errors->has('address'), 'layouts.__validation_error_feedback', ['message' => $errors->first('address')])
</div>
