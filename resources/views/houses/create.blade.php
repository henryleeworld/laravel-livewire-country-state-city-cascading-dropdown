@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ trans('frontend.houses.create.title') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('houses.store') }}">
                            @csrf

                            <div class="mb-3 row">
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

                            @livewire('country-state-city', ['selectedCity' => NULL])

                            <div class="mb-3 row">
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

                            <div class="row mb-0">
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