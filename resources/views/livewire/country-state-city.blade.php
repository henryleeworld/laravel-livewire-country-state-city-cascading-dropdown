<div>
    <div class="mb-3 row">
        <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

        <div class="col-md-6">
            <select wire:model.live="selectedCountry" class="form-control">
                <option value="" selected>{{ __('Choose country') }}</option>
                @foreach($countries as $country)
                    <option value="{{ $country->id }}">{{ __($country->name) }}</option>
                @endforeach
            </select>
        </div>
    </div>
    @if (!is_null($selectedCountry))
        <div class="mb-3 row">
            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

            <div class="col-md-6">
                <select wire:model.live="selectedState" class="form-control">
                    <option value="" selected>{{ __('Choose state') }}</option>
                    @foreach($states as $state)
                        <option value="{{ $state->id }}">{{ __($state->name) }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif

    @if (!is_null($selectedState))
        <div class="mb-3 row">
            <label for="city" class="col-md-4 col-form-label text-md-right">{{ __('City') }}</label>

            <div class="col-md-6">
                <select wire:model.live="selectedCity" class="form-control" name="city_id">
                    <option value="" selected>{{ __('Choose city') }}</option>
                    @foreach($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
</div>
