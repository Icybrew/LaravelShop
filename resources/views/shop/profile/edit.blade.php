@extends('layouts.main')

@section('content')
<div>
    <h1 class="text-center py-2">{!! __('profile.title.edit') !!}</h1>
    <div class="col-xl-6 col-lg-8 col-md-10 col-sm-10 mx-auto mb-5 py-2 shadow d-flex flex-column">
        <form action="{{ route('profile.update') }}" method="post">
@csrf
@method('PATCH')
            <div class="row border-bottom my-1 py-1">
                <h5 class="my-auto mr-3 col-3">{!! __('profile.username') !!}:</h5>
                <input type="string" class="form-control col-8 my-auto @error('username') is-invalid @enderror" name="username" value="{{ old('username') ? old('username') : $user->name }}" placeholder="{!! __('profile.input.username') !!}">
@error('username')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
@enderror
            </div>
            <div class="row border-bottom my-1 py-2">
                <h5 class="my-auto mr-3 col-3">{!! __('profile.email') !!}: </h5>
                <h5 class="my-auto text-muted col-8">{{ $user->email }}</h5>
            </div>
            <div class="row border-bottom my-1 py-1">
                <h5 class="my-auto mr-3 col-3">{!! __('profile.password') !!}: </h5>
                <input type="password" class="form-control col-8 my-auto @error('password') is-invalid @enderror" name="password" placeholder="{!! __('profile.input.password_confirm') !!}" required>
@error('password')
                <span class="invalid-feedback text-center" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
@enderror
            </div>
            <div class="mt-3 pb-5">
                <a href="{{ route('profile.index') }}"><button type="button" class="btn btn-dark float-left">{!! __('profile.button.back') !!}</button></a>
                <button type="submit" class="btn btn-primary float-right">{!! __('profile.button.confirm') !!}</button>
            </div>
        </form>
    </div>
</div>
@endsection