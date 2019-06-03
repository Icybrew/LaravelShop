@extends('layouts.main')

@section('content')
<div class="row m-0">
    <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 border-left border-right mb-1">
@component('admin_menu')
@endcomponent
    </aside>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 my-2 mx-auto">
        <div class="col-12">
            <h1 class="text-center">{{ $user->name }}</h1>
        </div>
@component('components.errors')
@endcomponent
        <div class="col-xl-7 col-lg-10 col-md-10 col-sm-12 mx-auto">
            <div class="row border-bottom my-1 py-2">
                <h5 class="my-auto mr-3 col-3">{{ __('admin.users.user.name') }}:</h5>
                <h5 class="my-auto col-8">{{ $user->name }}</h5>
            </div>
            <div class="row border-bottom my-1 py-2">
                <h5 class="my-auto mr-3 col-3">{{ __('admin.users.user.email') }}: </h5>
                <h5 class="my-auto col-8">{{ $user->email }}</h5>
            </div>
            <div class="row my-1 py-2">
                <h5 class="my-auto mr-3 col-3">{{ __('admin.users.user.registered') }}: </h5>
                <h5 class="my-auto col-8">{{ $user->created_at }}</h5>
            </div>
            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 my-2 mx-auto">
                <a href="{{ route('admin.users.edit', $user->id) }}"><button type="button" class="btn btn-block btn-primary">{{ __('admin.users.edit.title') }}</button></a>
                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post" class="my-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-block btn-danger" name="delete">{{ __('shop.delete') }}</button>
                </form>
                <a href="{{ route('admin.users.index') }}"><button type="button" class="btn btn-block btn-dark">{{ __('shop.back') }}</button></a>
            </div>
        </div>
    </div>
</div>
@endsection