@extends('layouts.main')

@section('content')
<div>
    <h1 class="text-center py-2">{!! __('profile.title.profile') !!}</h1>
@if($errors->any())
@foreach($errors->all() as $error)
    <div class="alert alert-danger col-xl-6 col-lg-8 col-md-10 col-sm-10 mx-auto text-center" role="alert">
        {{ $error }}
    </div>
@endforeach
@endif
@if(session('success'))
    <div class="alert alert-success col-xl-6 col-lg-8 col-md-10 col-sm-10 mx-auto text-center" role="alert">
        {{ session('success') }}
    </div>
@endif
    <div class="col-xl-6 col-lg-8 col-md-10 col-sm-10 mx-auto mb-5 py-2 shadow d-flex flex-column">
        <div class="row border-bottom my-1 py-2">
            <h5 class="my-auto mr-3 col-3">{!! __('profile.username') !!}:</h5>
            <h5 class="my-auto col-8">{{ $user->name }}</h5>
        </div>
        <div class="row border-bottom my-1 py-2">
            <h5 class="my-auto mr-3 col-3">{!! __('profile.email') !!}: </h5>
            <h5 class="my-auto col-8">{{ $user->email }}</h5>
        </div>
        <div class="row my-1 py-2">
            <h5 class="my-auto mr-3 col-3">{!! __('profile.registered') !!}: </h5>
            <h5 class="my-auto col-8">{{ $user->created_at }}</h5>
        </div>
@can('update', $user)
        <div class="row mt-2 d-flex ">
            <a href="#" class="mx-auto"><button type="button" class="btn btn-primary">{!! __('profile.button.edit_password') !!}</button></a>
            <a href="{{ route('profile.edit') }}" class="mx-auto"><button type="button" class="btn btn-primary">{!! __('profile.button.edit') !!}</button></a>
        </div>
@endcan
    </div>
</div>
@endsection