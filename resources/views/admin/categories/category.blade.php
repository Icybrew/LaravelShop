@extends('layouts.main')

@section('content')
<div class="row m-0">
    <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 border-left border-right mb-1">
@component('admin_menu')
@endcomponent
    </aside>
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 my-2 row m-0 p-0">
        <div class="col-12">
            <h1 class="text-center">{{ $category->name }}</h1>
        </div>
@component('components.errors')
@endcomponent
<div class="col-xl-5 col-lg-10 col-md-10 col-sm-12 mx-auto my-1">
    <img src="{{ $category->image ? (asset(config('shop.image.storage') . config('shop.image.categories') . $category->image)) : asset(config('shop.image.default')) }}" class="img-fluid d-block mx-auto">
</div>
        <div class="col-xl-7 col-lg-10 col-md-10 col-sm-12 mx-auto my-1">
            <div class="row border-bottom my-1 py-2">
                <h5 class="my-auto mr-3 col-3">{!! __('admin.categories.category.name') !!}:</h5>
                <h5 class="my-auto col-8">{{ $category->name }}</h5>
            </div>
            <div class="row border-bottom my-1 py-2">
                <h5 class="my-auto mr-3 col-3">{{ __('admin.categories.category.created') }}: </h5>
                <h5 class="my-auto col-8">{!! $category->created_at !!}</h5>
            </div>
            <div class="row border-bottom my-1 py-2">
                <h5 class="my-auto mr-3 col-3">{{ __('admin.categories.category.updated') }}: </h5>
                <h5 class="my-auto col-8">{!! $category->updated_at !!}</h5>
            </div>
            <div class="row border-bottom my-1 py-2">
                <h5 class="my-auto mr-3 col-3">{{ __('admin.categories.category.products') }}: </h5>
                <h5 class="my-auto col-8">{!! $category->products !!}</h5>
            </div>
            <div class="col-xl-10 col-lg-8 col-md-8 col-sm-8 my-2 mx-auto">
                <a href="{{ route('admin.categories.edit', $category->id) }}"><button type="button" class="btn btn-block btn-primary">{{ __('admin.button.edit') }}</button></a>
                <form action="{{ route('admin.categories.destroy', $category->id) }}" method="post" class="my-2">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-block btn-danger" name="delete">{{ __('admin.button.delete') }}</button>
                </form>
                <a href="{{ route('admin.categories.index') }}"><button type="button" class="btn btn-block btn-dark">{{ __('admin.button.back') }}</button></a>
            </div>
        </div>
    </div>
</div>
@endsection