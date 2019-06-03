@extends('layouts.main')

@section('content')
            <div class="row m-0">
                <aside class="col-xl-3 col-lg-3 col-md-12 col-sm-12 border-left border-right mb-1">
@component('menu')
@endcomponent
                </aside>

                <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 row p-0 m-0 d-flex justify-content-start">
@if(!empty($categories) && count($categories) > 0)
@foreach($categories as $category)
                    <div class="card col-lg-4 col-md-6 col-sm-12 p-0 my-1">
                        <a href="{{ route('categories.show', $category->id), $category->id}}">
                            <img src="{{ $category->image ? (asset(config('shop.image.storage') . config('shop.image.categories') . $category->image)) : asset(config('shop.image.default')) }}" class="card-img-top p-4" alt="{{$category->name}}" title="{{$category->name}}">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title text-center"><a href="{{ route('categories.show', $category->id), $category->id}}">{{$category->name}}</a></h5>
                        </div>
                    </div>
@endforeach
                    <div class="col-12 mt-2">
{{ $categories->links() }}
                    </div>
@else
                    <h3 class="mx-auto my-5">{!! __('category.no_categories') !!}</h3>
@endif
                </div>
            </div>
@endsection