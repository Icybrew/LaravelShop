@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10 col-sm-12">
            <div class="my-3 py-2">
                <h1 class="border-bottom pb-3 m-0 text-center">{{ __('auth.register') }}</h1>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">

                            <div class="input-group col-11 mx-auto">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-user"></i></div>
                                </div>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" minlength="{{ config('shop.user.minUsernameLength') }}" name="name" value="{{ old('name') }}" placeholder="{{ __('auth.input.name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">

                            <div class="input-group col-11 mx-auto">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                </div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="{{ __('auth.input.email') }}" required autocomplete="email">

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
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="{{ __('auth.input.password') }}" required autocomplete="new-password">

                                @error('password')
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
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="{{ __('auth.input.password_confirm') }}" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-6 mx-auto">
                                <button type="submit" class="btn btn-primary btn-block py-2">
                                    {{ __('auth.register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="text-center mt-3">
                    <a href="{{ route('login') }}">{{ __('auth.link.member') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
