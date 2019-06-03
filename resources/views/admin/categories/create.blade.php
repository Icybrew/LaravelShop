@extends('layouts.main')

@section('content')
<div class="row m-0">
    <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 border-left border-right mb-1">
@component('admin_menu')
@endcomponent
    </aside>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 my-2 mx-auto">
        <div class="col-12">
            <h1 class="text-center">{{__('admin.categories.create.title')}}</h1>
        </div>
@component('components.errors')
@endcomponent
        <div class="col-xl-6 col-lg-10 col-md-10 col-sm-12 mx-auto">
            <form action="{{ route('admin.categories.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" minlength="3" name="name" value="{{ old('name') }}" placeholder="{{__('admin.categories.input.name')}}" required>
                </div>
                <div class="form-group mb-3 custom-file">
                    <input type="file" class="custom-file-input @error('image') is-invalid @enderror" name="image">
                    <label class="custom-file-label" for="customFile">{{ __('admin.categories.input.image') }}</label>
                </div>
                <button type="submit" class="btn btn-success btn-block">{{__('admin.button.create')}}</button>
                <a href="{{url()->previous()}}" class="d-block mt-2"><button type="button" class="btn btn-block btn-secondary">{{ __('admin.button.back') }}</button></a>
            </form>
        </div>
    </div>
</div>
@endsection