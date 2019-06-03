@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12">
            <div class="my-3 py-2">
                <h1 class="border-bottom pb-2 text-center">{{ __('auth.login') }}</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="input-group col-11 mx-auto">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.input.email') }}" required autocomplete="email" autofocus>

@error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
@enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="input-group col-11 mx-auto">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                </div>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.input.password') }}" required autocomplete="current-password">

@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
@enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="input-group col-12">
                                <div class="form-check mx-auto">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('auth.input.remember') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-8 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block py-2">
                                    {{ __('auth.login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
@if (Route::has('password.request'))
                <div class="text-center mt-3">
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('auth.link.forgot') }}
                    </a>
                </div>
@endif
            </div>
        </div>
    </div>
</div>
@endsection
