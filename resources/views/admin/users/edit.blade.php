@extends('layouts.main')

@section('content')
<div class="row m-0">
    <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 border-left border-right mb-1">
@component('admin_menu')
@endcomponent
    </aside>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 my-2 mx-auto">
        <div class="col-12">
            <h1 class="text-center">{{__('admin.users.edit.title', ['user' => $user->name])}}</h1>
        </div>
@component('components.errors')
@endcomponent
        <div class="col-xl-6 col-lg-10 col-md-10 col-sm-12 mx-auto">
            <form action="{{ route('admin.users.update', $user->id) }}" method="post">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $user->name }}" placeholder="{{__('admin.users.input.name')}}" required>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control" name="email" value="{{ old('email') ? old('email') : $user->email }}" placeholder="{{__('admin.users.input.email')}}" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="{{__('admin.users.input.password')}}">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="{{__('admin.users.input.password_confirm')}}">
                </div>
                <button type="submit" class="btn btn-success btn-block">{{__('admin.button.update')}}</button>
                <a href="{{ url()->previous() }}" class="d-block mt-2"><button type="button" class="btn btn-block btn-secondary">{{ __('admin.button.back') }}</button></a>
            </form>
        </div>
    </div>
</div>
@endsection