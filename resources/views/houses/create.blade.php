@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('frontend.houses.create.title') }}</div>
                    @if(session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('houses.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('frontend.houses.create.content.house_name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control @error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}" required autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            @livewire('country-state-city')
                            <!--                       
                            <div class="form-group row">
                                <label for="country"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('frontend.houses.create.content.country') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="country_id">
                                        <option value="" selected>{{ trans('frontend.houses.create.content.choose_country') }}</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row d-none" id="state">
                                <label for="state"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('frontend.houses.create.content.state') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="state_id">
                                        <option value="" selected>{{ trans('frontend.houses.create.content.choose_state') }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row d-none" id="city">
                                <label for="city" class="col-md-4 col-form-label text-md-right">{{ trans('frontend.houses.create.content.city') }}</label>

                                <div class="col-md-6">
                                    <select class="form-control" id="city_id">
                                        <option value="" selected>{{ trans('frontend.houses.create.content.choose_city') }}</option>
                                    </select>
                                </div>
                            </div>
                            -->
                            <div class="form-group row">
                                <label for="price"
                                       class="col-md-4 col-form-label text-md-right">{{ trans('frontend.houses.create.content.price_in_usd') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number"
                                           class="form-control @error('price') is-invalid @enderror" name="price"
                                           value="{{ old('price') }}" required>

                                    @error('price')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ trans('frontend.houses.create.content.save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#country_id').change(function () {
                var $state = $('#state_id');
                $.ajax({
                    url: "{{ route('states.index') }}",
                    data: {
                        country_id: $(this).val()
                    },
                    success: function (data) {
                        $state.html('<option value="" selected>Choose state</option>');
                        $.each(data, function (id, value) {
                            $state.append('<option value="' + id + '">' + value + '</option>');
                        });
                    }
                });

                $('#state_id, #city_id').val("");
                $('#state').removeClass('d-none');

            });

            $('#state_id').change(function () {
                var $city = $('#city_id');
                $.ajax({
                    url: "{{ route('cities.index') }}",
                    data: {
                        state_id: $(this).val()
                    },
                    success: function (data) {
                        $city.html('<option value="" selected>Choose city</option>');
                        $.each(data, function (id, value) {
                            $city.append('<option value="' + id + '">' + value + '</option>');
                        });
                    }
                });
                $('#city').removeClass('d-none');
            });
        });
    </script>
@endsection
